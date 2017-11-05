<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UserTableSeeder extends Seeder

{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create("App\User");

        for($i = 1; $i <= 10; $i ++) {
            $gender = $faker->randomElements(['male', 'female']);
            DB::table('users')->insert([
                'id' => $faker->numberBetween($min = 100000000, $max = 999999999),
                'name' => $faker->name($gender),
                'updated_at' => \Carbon\Carbon::now(),
                'created_at' => \Carbon\Carbon::now(),
                'avatar' => $faker->imageUrl($width = 960, $height = 960), // 'http://lorempixel.com/200/200/'
                'gender' => $faker->randomElement($array = array ('male', 'female')) ,
            ]);
        };
    }
}
