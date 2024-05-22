<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Source extends Model
{
    use HasFactory;

    public function playlistTracks(): HasMany
    {
        return $this->hasMany(PlaylistTrack::class);
    }

    const ID         = 'id';
    const NAME       = 'name';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
