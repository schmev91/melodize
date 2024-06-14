<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Comment
 *
 * @property int $id  ID of the comment
 * @property int $user_id
 * @property int $trackr_id
 * @property string $content
 * @property Carbon|null $at
 * @property Carbon  $created_at Date of creation
 * @property Carbon  $updated_at Date of update
 */
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

    protected $casts = [
        self::AT => "datetime"
    ];

    
    // Column constants
    public const ID = 'id';
    public const USER_ID = 'user_id';
    public const TRACK_ID = 'track_id';
    public const CONTENT = 'content';
    public const AT = 'at';
    public const CREATED_AT = 'created_at';
    public const UPDATED_AT = 'updated_at';

    
}
