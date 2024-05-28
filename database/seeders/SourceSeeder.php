<?php

namespace Database\Seeders;

use App\Enums\SourceType;
use App\Models\Source;
use Illuminate\Database\Seeder;

class SourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $list = [
            [ Source::NAME => SourceType::LOCAL->value ],
            [ Source::NAME => SourceType::SPOTIFY->value ],
            [ Source::NAME => SourceType::DEEZER->value ],
            [ Source::NAME => SourceType::YOUTUBE->value ],
         ];

        foreach ($list as $row) {
            Source::create($row);
        }
    }
}
