<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            SourceSeeder::class,
            GenreSeeder::class,
            TrackSeeder::class
         ]);
    }
}
