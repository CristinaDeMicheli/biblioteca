<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class UserController extends Controller
{
    //
    public function authenticate(Request $request)
{
$credentials = $request->only('email', 'password');
try {
if (! $token = JWTAuth::attempt($credentials)) {
return response()->json(['error' => 'invalid_credentials'], 400);
}
} catch (JWTException $e) {
return response()->json(['error' => 'could_not_create_token'], 500);
}
return response()->json(compact('token'));
}
{
$validator = Validator::make($request->all(), [
'name' => 'required|string|max:255',
'email' => 'required|string|email|max:255|unique:users',
'password' => 'required|string|min:6|confirmed',
]);
if($validator->fails()){
return response()->json($validator->errors()->toJson(), 400);
}
$user = User::create([
'name' => $request->get('name'),
'email' => $request->get('email'),
'password' => Hash::make($request->get('password')),
]);
$token = JWTAuth::fromUser($user);
return response()->json(compact('user','token'),201);
}
public function getAuthenticatedUser()
{
try {
if (! $user = JWTAuth::parseToken()->authenticate()) {
return response()->json(['user_not_found'], 404);
}
} catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
return response()->json(['token_expired'], $e->getStatusCode());
} catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
return response()->json(['token_invalid'], $e->getStatusCode());
} catch (Tymon\JWTAuth\Exceptions\JWTException $e) {
return response()->json(['token_absent'], $e->getStatusCode());
}
return response()->json(compact('user'));
}

public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'editorial' => 'required|string',
            'short_bio' => 'required|string',
            'role' => 'required'
        ]);

        if ($request->role == User::ROLE_USER) {

            $userable = Writer::create([
                'editorial' => $request->get('editorial'),
                'short_bio' => $request->get('short_bio'),
            ]);
        } else {
            $userable = Admin::create([
                'credential_number' => $request->get('credential_number'),
            ]);
        }

        $user = $userable->user()->create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),]);

        $token = JWTAuth::fromUser($user);

        return response()->json(new UserResource($user, $token), 201)
            ->withCookie(
                'token',
                $token,
                config('jwt.ttl'),
                '/',
                null,
                config('app.env') !== 'local',
                true,
                false,
                config('app.env') !== 'local' ? 'None' : 'Lax'
            );
    }

    public function getAuthenticatedUser()
    {
        try {
            if (!$user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['message' => 'user_not_found'], 404);
            }
        } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
            return response()->json(['message' => 'token_expired'], $e->getStatusCode());
        } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
            return response()->json(['message' => 'token_invalid'], $e->getStatusCode());
        } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {
            return response()->json(['message' => 'token_absent'], $e->getStatusCode());
        }
        return response()->json(new UserResource($user), 200);
    }

    public function logout()
    {
        try {
            JWTAuth::invalidate(JWTAuth::getToken());

//            Cookie::queue(Cookie::forget('token'));
//            $cookie = Cookie::forget('token');
//            $cookie->withSameSite('None');
            return response()->json([
                "status" => "success",
                "message" => "User successfully logged out."
            ], 200)
                ->withCookie('token', null,
                config('jwt.ttl'),
                '/',
                null,
                config('app.env') !== 'local',
                true,
                false,
                config('app.env') !== 'local' ? 'None' : 'Lax'
            );
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(["message" => "No se pudo cerrar la sesión."], 500);
        }
    }
}
