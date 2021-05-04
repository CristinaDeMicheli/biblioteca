<?php

use Illuminate\Database\Seeder;
use App\User;



class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        
 DB::statement('SET FOREIGN_KEY_CHECKS = 0;'); // Desactivamos la revisión de claves foráneas
              // Vaciar la tabla.
        User::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;'); // Reactivamos la revisión de claves foráneas
$faker = \Faker\Factory::create();
// Crear la misma clave para todos los usuarios
// conviene hacerlo antes del for para que el seeder
// no se vuelva lento.
$password = Hash::make('12341234');
User::create([
'name' => 'Administrador',
'email' => 'admin@prueba.com',
'password' => $password,
]);
// Generar algunos usuarios para nuestra aplicacion
for ($i = 0; $i < 10; $i++) {
User::create([
'name' => $faker->name,
'email' => $faker->email,
'password' => $password,
]);
    }
}
}