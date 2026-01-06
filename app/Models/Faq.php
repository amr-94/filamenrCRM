<?php

namespace App\Models;

use App\Traits\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia as SpatieHasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Faq extends Model implements SpatieHasMedia
{
    use SoftDeletes, InteractsWithMedia;

    protected $fillable = [
        'title',
        'slug',
        'question',
        'answer',
        'tags',
        'order',
        'is_active',
        'created_by',
        'seo_title',
        'seo_description',
        'seo_keywords',
    ];

    protected $casts = [
        'is_active' => 'boolean',
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
