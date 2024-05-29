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
            [ Genre::NAME => 'Future' ],
            [ Genre::NAME => 'Kawaii Bass' ],
            [ Genre::NAME => 'J-POP' ],
            [ Genre::NAME => 'Vocaloid' ],
            [ Genre::NAME => 'R & B' ],
            [ Genre::NAME => 'Instrumental' ],
         ]);
    }
}
