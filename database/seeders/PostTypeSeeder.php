<?php

namespace Database\Seeders;

use App\Models\PostType;
use Illuminate\Database\Seeder;

class PostTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $postTypes = [
            [ 'name' => 'Article' ],
            [ 'name' => 'Review' ],
            [ 'name' => 'News' ],
         ];

        foreach ($postTypes as $type) {
            PostType::create($type);
        }
    }
}
