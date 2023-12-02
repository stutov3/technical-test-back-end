<?php

namespace Database\Seeders;

use App\Models\Farm;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class FarmsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Create 10 fake farms
        for ($i = 1; $i <= 10; $i++) {
            Farm::create([
                'name' => $faker->company,
            ]);
        }
    }
}
