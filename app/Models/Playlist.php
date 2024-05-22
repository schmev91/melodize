<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Playlist extends Model
{
    use HasFactory;

    protected $fillable = [
        self::USER_ID,
        self::NAME,
     ];

     
    public function tracks(): BelongsToMany
    {
        return $this->belongsToMany(Track::class)
            ->using(PlaylistTrack::class)
            ->withPivot(PlaylistTrack::SOURCE_ID);
    }


    const ID         = 'id';
    const USER_ID    = 'user_id';
    const NAME       = 'name';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
