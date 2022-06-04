<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\UsersSeeder;
use Database\Seeders\DisastersSeeder;
use Database\Seeders\DisasterTypesSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // You can uncomment DisasterTypesSeeder if you wish to use static data and also for production
        $this->call([
            UsersSeeder::class,
            DisastersSeeder::class,
            // DisasterTypesSeeder::class
        ]);
    }
}
