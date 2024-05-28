<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Model
{
    use HasFactory;

    protected $fillable = [ self::USERNAME, self::NAME, self::IS_ADMIN, self::PASSWORD, self::AVATAR ];

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

    const ID         = 'id';
    const USERNAME   = 'username';
    const NAME       = 'name';
    const IS_ADMIN   = 'isAdmin';
    const PASSWORD   = 'password';
    const AVATAR     = 'avatar';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
