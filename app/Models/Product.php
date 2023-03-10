<?php

namespace App\Models;

use App\Helpers\CoverHelper;
use App\Helpers\VideoHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Product extends Model
{
    use HasFactory, HasSlug;

    protected $fillable = [
        'name',
        'slug',
        'cover',
        'video',
        'description',
        'price',
        'category_id',
    ];

    protected $casts = [
        'price' => 'float',
    ];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function getCoverUrlAttribute()
    {
        return CoverHelper::getUrl($this->cover);
    }

    public function getVideoUrlAttribute()
    {
        return VideoHelper::getUrl($this->video);
    }
}
