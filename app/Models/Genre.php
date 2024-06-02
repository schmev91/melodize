<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Genre extends Model
{
    use HasFactory;

    public function tracks(): BelongsToMany
    {
        return $this->belongsToMany(Track::class, TrackGenre::TABLE_NAME)
            ->using(TrackGenre::class);
    }

    public function totalTracks()
    {
        return $this->tracks()->count();
    }

    const ID         = 'id';
    const NAME       = 'name';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
