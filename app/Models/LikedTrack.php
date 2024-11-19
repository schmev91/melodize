<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LikedTrack extends Model
{
    use HasFactory;
    const TABLE_NAME = 'liked_tracks';

    protected $fillable = [
        self::USER_ID,
        self::TRACK_ID,
     ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function track(): BelongsTo
    {
        return $this->belongsTo(Track::class);
    }

    const USER_ID    = 'USER_ID';
    const TRACK_ID   = 'TRACK_ID';
    const CREATED_AT = 'CREATED_AT';
    const UPDATED_AT = 'UPDATED_AT';
}
