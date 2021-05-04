<?php

use Illuminate\Database\Seeder;
use App\Book;

class BookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	 DB::statement('SET FOREIGN_KEY_CHECKS = 0;'); // Desactivamos la revisión de claves foráneas
              // Vaciar la tabla.
        Book::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;'); // Reactivamos la revisión de claves foráneas

        

$faker = \Faker\Factory::create();
// Crear libros ficticios en la tabla
for ($i = 0; $i < 50; $i++) {
 Book::create([
 //'id' => $faker->randomDigitNotNull,
'name' => $faker->sentence,
'description' => $faker->sentence,
'estado' => 'disponible',
 //'time' => $faker->dateTime($max = 'now'),
 //'time' => $faker->dateTime($max = 'now'),
 //'time' => $faker->dateTime($max = 'now'),
]);
}
    }
}
