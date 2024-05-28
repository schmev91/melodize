<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TrackGenre extends Model
{
    use HasFactory;

    public function track(): BelongsTo
    {
        return $this->belongsTo(Track::class);
    }

    public function genre(): BelongsTo
    {
        return $this->belongsTo(Genre::class);
    }

    const ID         = 'id';
    const TRACK_ID   = 'track_id';
    const GENRE_ID   = 'genre_id';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
