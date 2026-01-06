<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class PricingPlan extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'price',
        'currency',
        'period',
        'discount_text',
        'features',
        'is_popular',
        'is_active',
        'order',
        'created_by',
        'seo_title',
        'seo_description',
        'seo_keywords',
    ];

    protected $casts = [
        'features' => 'json',
        'is_popular' => 'boolean',
        'is_active' => 'boolean',
        'price' => 'decimal:2',
        'order' => 'integer',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->order)) {
                $model->order = static::max('order') + 1;
            }
        });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
