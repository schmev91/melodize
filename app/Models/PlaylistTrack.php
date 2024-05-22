<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

class PlaylistTrack extends Pivot
{
    const TABLE_NAME = 'playlist_track';

    protected $table = self::TABLE_NAME;
    protected $fillable = [ self::IDENTITY, self::PLAYLIST_ID, self::TRACK_ID, self::SOURCE_ID ];


    public function playlist(): BelongsTo
    {
        return $this->belongsTo(Playlist::class);
    }

    public function track(): BelongsTo
    {
        return $this->belongsTo(Track::class);
    }

    public function source(): BelongsTo
    {
        return $this->belongsTo(Source::class);
    }


    const ID          = 'id';
    const IDENTITY    = 'identity';
    const PLAYLIST_ID = 'playlist_id';
    const TRACK_ID    = 'track_id';
    const SOURCE_ID   = 'source_id';
    const CREATED_AT  = 'created_at';
    const UPDATED_AT  = 'updated_at';
}
