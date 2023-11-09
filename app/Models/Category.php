<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $table = self::TABLE;
    public $timestamps = false;

    const TABLE = 'categories';

    const _ID = 'id';
    const _NAME = 'name';
    const _SLUG = 'slug';
    const _CREATED_AT = 'created_at';
    const _UPDATED_AT = 'updated_at';

    protected $fillable = [
        self::_ID,
        self::_NAME,
        self::_SLUG,
        self::_CREATED_AT,
        self::_UPDATED_AT,
    ];

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
}
