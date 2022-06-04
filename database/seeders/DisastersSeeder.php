<?php

namespace Database\Seeders;

use App\Models\Disasters;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DisastersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // For Database factory many to many relationship testing
        Disasters::factory(5)->has(\App\Models\DisasterTypes::factory()->count(1), 'types')->create();
        // If you wish to only create fake disaster data, use script below
        // Disasters::factory(10)->create();
    }
}
