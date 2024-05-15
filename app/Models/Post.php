<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;

    const ID         = 'id';
    const TITLE      = 'title';
    const CONTENT    = 'content';
    const VIEWS      = 'views';
    const USER_ID    = 'user_id';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const THUMBNAIL  = 'thumbnail';
    const TYPE_ID    = 'type_id';

    public function type(): BelongsTo
    {
        return $this->belongsTo(PostType::class, 'type_id');
    }

    protected $fillable = [
        self::TITLE,
        self::CONTENT,
        self::VIEWS,
        self::USER_ID,
        self::THUMBNAIL,
        self::CREATED_AT,
        self::UPDATED_AT,
     ];
}
