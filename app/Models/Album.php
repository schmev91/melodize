<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    const ID = 'id';
    const NAME = 'name';
    const COVER = 'cover';
    const DESCRIPTION = 'description';
    const AMOUNT = 'amount';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $fillable = [
        self::ID,
        self::NAME,
        self::COVER,
        self::DESCRIPTION,
        self::AMOUNT,
        self::CREATED_AT,
        self::UPDATED_AT,
     ];
}
