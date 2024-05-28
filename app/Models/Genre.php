<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Genre extends Model
{
    use HasFactory;

    public function tracks(): HasManyThrough
    {
        return $this->hasManyThrough(Track::class, TrackGenre::class);
    }

    const ID         = 'id';
    const NAME       = 'name';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
