<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * Class Track
 *
 * @property int    $id  ID of the track
 * @property int $user_id
 * @property string $title Title of the track
 * @property string $artist Artist of the track
 * @property string|null  $description Description of the track
 * @property string|null  $cover Cover of the track
 * @property string $url URL of the track
 * @property Carbon  $created_at Date of creation
 * @property Carbon  $updated_at Date of update
 * @property int $listens listen count for the track
 */
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

    protected $fillable = [
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
