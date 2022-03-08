<?php

namespace Database\Seeders;

use App\Models\Appartement;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * // use the factory to create a Faker\Generator instance
     * 

     *
     * @return void
     */
    public function run()
    { 
            $faker = Faker::create('fr_FR');
            for ($i = 0; $i <= 10; $i++) {
                $appartement = new Appartement;
                $appartement->title = $faker->text(10);
                $appartement->description = $faker->text(200);
                $appartement->floor = $faker->randomNumber();
                $appartement->size = $faker->randomNumber();
                $appartement->image = $faker->text(100);
                $appartement->room = $faker->randomNumber();
                $appartement->price = $faker->randomNumber();
                $appartement->address = $faker->address(100);
                $appartement->postcode = $faker->randomNumber();
                $appartement->city = $faker->text(100);
                $appartement->save();
            }
         
        // \App\Models\User::factory(10)->create();
    }
}
