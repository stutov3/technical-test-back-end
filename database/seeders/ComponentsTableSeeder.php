<?php

namespace Database\Seeders;

use App\Models\Component;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ComponentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // You can adjust this data based on your requirements
        $componentsData = [
            [
                'component_type_id' => 1, // Replace with your actual component type ID
                'turbine_id' => 1, // Replace with your actual turbine ID
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'component_type_id' => 2, // Replace with your actual component type ID
                'turbine_id' => 2, // Replace with your actual turbine ID
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more components as needed
        ];

        // Insert data into the components table
        Component::insert($componentsData);
    }
}
