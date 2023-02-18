<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
class News extends Model
{
    use HasFactory;

    protected $table = "news";

    protected $fillable = [
        'title',
        'author',
        'status',
        'image',
        'description'
    ];

    protected $casts = [
        'categories_id' => 'array'
    ];

    protected function author(): Attribute
    {
        return Attribute::make(
            get: fn($value): string => strtoupper($value),
            set: fn($value): string => strtolower($value)
        );
    }
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(
            Category::class,
            'category_has_news',
        );
    }

}
