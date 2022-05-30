<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\DisasterTypes;

class DisasterTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DisasterTypes::truncate();
        DisasterTypes::create(['name' => 'Flood']);
        DisasterTypes::create(['name' => 'Landslide']);
        DisasterTypes::create(['name' => 'Earthquake']);
        DisasterTypes::create(['name' => 'Tsunami']);
        DisasterTypes::create(['name' => 'Tornado']);
    }
}
