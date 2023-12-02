<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ComponentTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'Blade'],
            ['name' => 'Rotor'],
            ['name' => 'Hub'],
            ['name' => 'Generator'],
        ];

        DB::table('component_types')->insert($data);
    }
}
