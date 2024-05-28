<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TrackGenre extends Model
{
    use HasFactory;

    protected $primaryKey = [ self::TRACK_ID, self::GENRE_ID ];
    public $incrementing  = false;

    public function track(): BelongsTo
    {
        return $this->belongsTo(Track::class);
    }

    public function genre(): BelongsTo
    {
        return $this->belongsTo(Genre::class);
    }

    protected $fillable = [
        self::TRACK_ID,
        self::GENRE_ID,
     ];

    const TRACK_ID   = 'track_id';
    const GENRE_ID   = 'genre_id';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
