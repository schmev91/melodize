<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Track extends Model
{
    use HasFactory;

    const DEFAULT_COVER = 'img/default/track.png';

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function genres(): BelongsToMany
    {
        return $this->belongsToMany(Genre::class, 'track_genres')
        ;
    }

    public function playlists(): BelongsToMany
    {
        return $this->belongsToMany(Playlist::class)
            ->using(PlaylistTrack::class)
            ->withPivot(PlaylistTrack::SOURCE_ID);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    protected $fillables = [
        self::USER_ID, self::TITLE, self::ARTIST, self::DESCRIPTION, self::COVER, self::URL, self::LISTENS,
     ];

    const ID          = 'id';
    const USER_ID     = 'user_id';
    const TITLE       = 'title';
    const ARTIST      = 'artist';
    const DESCRIPTION = 'description';
    const COVER       = 'cover';
    const URL         = 'url';
    const LISTENS     = 'listens';
    const CREATED_AT  = 'created_at';
    const UPDATED_AT  = 'updated_at';
}
