<?php

namespace Database\Seeders;

use App\Models\Turbine;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TurbinesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Sample data for turbines
        $turbinesData = [
            [
                'name' => 'Turbine 1',
                'farm_id' => 1,
                'lat' => 123.456789,
                'lng' => -45.678901,
            ],
            [
                'name' => 'Turbine 2',
                'farm_id' => 1,
                'lat' => 12.345678,
                'lng' => -67.890123,
            ],
            // Add more turbine data as needed
        ];

        // Insert data into the turbines table
        foreach ($turbinesData as $turbineData) {
            Turbine::create($turbineData);
        }
    }
}
