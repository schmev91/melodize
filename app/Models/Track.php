<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    use HasFactory;

    const ID          = 'id';
    const NAME        = 'name';
    const COVER       = 'cover';
    const DESCRIPTION = 'description';
    const DURATION    = 'duration';
    const ARTIST_ID   = 'artist_id';
    const ALBUM_ID    = 'album_id';
    const CREATED_AT  = 'created_at';
    const UPDATED_AT  = 'updated_at';

    protected $fillable = [
        self::NAME,
        self::COVER,
        self::DESCRIPTION,
        self::DURATION,
        self::ARTIST_ID,
        self::ALBUM_ID,
     ];
}
