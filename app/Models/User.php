<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory;

    use Notifiable;

    public function tracks(): HasMany
    {
        return $this->hasMany(Track::class);
    }

    public function playlists(): HasMany
    {
        return $this->hasMany(Playlist::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function likes()
    {
        return $this->belongsToMany(Track::class, LikedTrack::TABLE_NAME)
            ->using(LikedTrack::class);
    }

    protected $fillable = [
        self::USERNAME,
        self::NAME,
        self::EMAIL,
        self::PASSWORD,
        self::AVATAR,
     ];
    protected $hidden = [
        self::PASSWORD,
        self::REMEMBER_TOKEN,
     ];

    const DEFAULT_AVATAR = 'img/default/avatar.jpg';

    const ID             = 'id';
    const USERNAME       = 'username';
    const NAME           = 'name';
    const EMAIL          = 'email';
    const IS_ADMIN       = 'isAdmin';
    const PASSWORD       = 'password';
    const AVATAR         = 'avatar';
    const CREATED_AT     = 'created_at';
    const UPDATED_AT     = 'updated_at';
    const REMEMBER_TOKEN = 'remember_token';

}
