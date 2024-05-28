<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;

    // Fillable fields
    protected $fillable = [
        self::USER_ID,
        self::TRACK_ID,
        self::CONTENT,
    ];

    // Relationships
    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function track() : BelongsTo
    {
        return $this->belongsTo(Track::class);
    }

    
    // Column constants
    public const ID = 'id';
    public const USER_ID = 'user_id';
    public const TRACK_ID = 'track_id';
    public const CONTENT = 'content';
    public const CREATED_AT = 'created_at';
    public const UPDATED_AT = 'updated_at';

    
}
