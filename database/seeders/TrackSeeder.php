<?php

namespace Database\Seeders;

use App\Models\Track;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TrackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tracks')->insert([
            [
                track::USER_ID    => 1,
                track::TITLE      => "S.A.D",
                track::ARTIST     => "nihosika",
                track::COVER      => 'img/covers/s.a.d.jpg',
                track::URL        => 'tracks/S.A.D_nihosika.mp3',
                track::CREATED_AT => now(),
                track::UPDATED_AT => now(),
             ],
            [
                track::USER_ID    => 1,
                track::TITLE      => "Animal",
                track::ARTIST     => "MiComet",
                track::COVER      => 'img/covers/micomet-animal.jpg',
                track::URL        => 'tracks/Animal - MiComet cover.mp3',
                track::CREATED_AT => now(),
                track::UPDATED_AT => now(),
             ],
            [
                track::USER_ID    => 1,
                track::TITLE      => "Catchy - cover",
                track::ARTIST     => "DAZBEE",
                track::COVER      => 'img/covers/catchy.jpg',
                track::URL        => 'tracks/dazbee_catchy.mp3',
                track::CREATED_AT => now(),
                track::UPDATED_AT => now(),
             ],
            [
                track::USER_ID    => 1,
                track::TITLE      => "Hikari",
                track::ARTIST     => "DAZBEE",
                track::COVER      => 'img/covers/dazbee-hikari.jpg',
                track::URL        => 'tracks/dazbee_hikari.mp3',
                track::CREATED_AT => now(),
                track::UPDATED_AT => now(),
             ],
            [
                track::USER_ID    => 1,
                track::TITLE      => "Gymnopdie No. 1",
                track::ARTIST     => "Erik Satie",
                track::COVER      => "img/default/track_old.png",
                track::URL        => 'tracks/Gymnopdie_No1.mp3',
                track::CREATED_AT => now(),
                track::UPDATED_AT => now(),
             ],
            [
                track::USER_ID    => 1,
                track::TITLE      => "Mikazuki Step - cover",
                track::ARTIST     => "DAZBEE",
                track::COVER      => "img/covers/mikazukistep.jpg",
                track::URL        => 'tracks/Mikazuki Step (r-906；三日月ステップ)／DAZBEE (Cover).mp3',
                track::CREATED_AT => now(),
                track::UPDATED_AT => now(),
             ],
            [
                track::USER_ID    => 1,
                track::TITLE      => "コネクト (ClariS) - cover",
                track::ARTIST     => "DAZBEE",
                track::COVER      => "img/covers/コネクト (ClariS) ／ダズビー COVER.jpg",
                track::URL        => 'tracks/コネクト (ClariS) ／ダズビー COVER.mp3',
                track::CREATED_AT => now(),
                track::UPDATED_AT => now(),
             ],
            [
                track::USER_ID    => 1,
                track::TITLE      => "シニカル・シニカル feat. Such",
                track::ARTIST     => "吐息",
                track::COVER      => "img/covers/シニカル・シニカル.jpg",
                track::URL        => 'tracks/シニカル・シニカル feat.Such.mp3',
                track::CREATED_AT => now(),
                track::UPDATED_AT => now(),
             ],
            [
                track::USER_ID    => 1,
                track::TITLE      => "マーシャルマキシマイザー - cover",
                track::ARTIST     => "星街すいせい",
                track::COVER      => "img/covers/マーシャル・マキシマイザー  星街すいせい(Cover).jpg",
                track::URL        => 'tracks/マーシャルマキシマイザー  星街すいせいCover.mp3',
                track::CREATED_AT => now(),
                track::UPDATED_AT => now(),
             ],
            [
                track::USER_ID    => 1,
                track::TITLE      => "福寿草 - cover",
                track::ARTIST     => "DAZBEE",
                track::COVER      => "img/covers/福寿草 (ぐにょ) ／ ダズビー COVER.jpg",
                track::URL        => 'tracks/福寿草 (ぐにょ) ／ ダズビー COVER.mp3',
                track::CREATED_AT => now(),
                track::UPDATED_AT => now(),
             ],
            [
                track::USER_ID    => 1,
                track::TITLE      => "Funk Assembly",
                track::ARTIST     => "PSYQUI",
                track::COVER      => "img/covers/funk_assembly_psyqui.jpg",
                track::URL        => 'tracks/Funk Assembly.mp3',
                track::CREATED_AT => now(),
                track::UPDATED_AT => now(),
             ],
         ]);
    }
}
