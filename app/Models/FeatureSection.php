<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class FeatureSection extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'badge',
        'title',
        'subtitle',
        'description',
        'image_position',
        'order',
        'is_active',
        'seo_title',
        'seo_description',
        'seo_keywords',
    ];

    protected $appends = [
        'image_url',
    ];

    public function getImageUrlAttribute(): ?string
    {
        return $this->getFirstMediaUrl('image');
    }

    public function items()
    {
        return $this->hasMany(FeatureItem::class)->orderBy('order');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->order)) {
                $model->order = static::max('order') + 1;
            }
        });
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('image')->singleFile();
    }
}
