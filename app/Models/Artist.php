<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    use HasFactory;

    const ID           = 'id';
    const NAME         = 'name';
    const DISPLAY_NAME = 'display_name';
    const CREATED_AT   = 'created_at';
    const UPDATED_AT   = 'updated_at';

    protected $fillable = [
        self::ID,
        self::NAME,
        self::DISPLAY_NAME,
        self::CREATED_AT,
        self::UPDATED_AT,
     ];
}
