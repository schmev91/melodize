<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    protected $fillable = [
        self::TITLE,
        self::CONTENT,
        self::VIEWS,
        self::USER_ID,
     ];
}
