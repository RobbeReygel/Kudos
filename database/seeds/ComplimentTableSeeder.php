<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\User;

class ComplimentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create("App\Compliment");

        for($i = 1; $i <= 10; $i ++) {
            DB::table('compliments')->insert([
                'content' => $faker->sentence(3),
                'to_id'=> App\User::all()->random()->id,
                'from_id'=>  App\User::all()->random()->id,
                'updated_at' => \Carbon\Carbon::now(),
                'created_at' => \Carbon\Carbon::now(),
            ]);
        };
    }
}
