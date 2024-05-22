<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Track extends Model
{
    use HasFactory;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function playlists(): BelongsToMany
    {
        return $this->belongsToMany(Playlist::class)
            ->using(PlaylistTrack::class)
            ->withPivot(PlaylistTrack::SOURCE_ID);
    }

    const ID          = 'id';
    const USER_ID     = 'user_id';
    const TITLE       = 'title';
    const ARTIST      = 'artist';
    const DESCRIPTION = 'description';
    const COVER       = 'cover';
    const URL         = 'url';
    const CREATED_AT  = 'created_at';
    const UPDATED_AT  = 'updated_at';
}
