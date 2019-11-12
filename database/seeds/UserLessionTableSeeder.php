<?php

use Illuminate\Database\Seeder;

class UserLessionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $limit = 10;

        for ($i = 0; $i < $limit; $i++) {
            DB::table('user_lession')->insert([
                'user_id' => 69,
                'lession_id' => rand(64, 76),
                'status' => rand(1, 3),
                'result' => rand(1, 10),
                'created_at' => $faker->dateTime($max = 'now', $timezone = null),
                'updated_at' => $faker->dateTime($max = 'now', $timezone = null),
            ]);
        }
    }
}
