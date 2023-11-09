<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;

    protected $table = self::TABLE;
    public $timestamps = false;

    const TABLE = 'posts';

    const _ID = 'id';
    const _TITLE = 'title';
    const _SLUG = 'slug';
    const _CONTENT = 'content';
    const _CATEGORY_ID = 'category_id';
    const _IS_PUBLISHED = 'is_published';
    const _CREATED_AT = 'created_at';
    const _UPDATED_AT = 'updated_at';

    protected $fillable = [
        self::_ID,
        self::_TITLE,
        self::_SLUG,
        self::_CONTENT,
        self::_CATEGORY_ID,
        self::_IS_PUBLISHED,
        self::_CREATED_AT,
        self::_UPDATED_AT,
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
