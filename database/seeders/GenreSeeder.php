<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('genres')->insert([
            [ Genre::NAME => 'Future', genre::CREATED_AT => now(), genre::UPDATED_AT => now() ],
            [ Genre::NAME => 'Kawaii Bass', genre::CREATED_AT => now(), genre::UPDATED_AT => now() ],
            [ Genre::NAME => 'J-POP', genre::CREATED_AT => now(), genre::UPDATED_AT => now() ],
            [ Genre::NAME => 'Vocaloid', genre::CREATED_AT => now(), genre::UPDATED_AT => now() ],
            [ Genre::NAME => 'R & B', genre::CREATED_AT => now(), genre::UPDATED_AT => now() ],
            [ Genre::NAME => 'Instrumental', genre::CREATED_AT => now(), genre::UPDATED_AT => now() ],
         ]);
    }
}
