<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
	    for($i = 0; $i < 1000; $i++) {
	        App\User::create([
	            'username' => $faker->userName,
	            'name' => $faker->name,
	            'email' => $faker->email
	        ]);
	    }
    }
}
