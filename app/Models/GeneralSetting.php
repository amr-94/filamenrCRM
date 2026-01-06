<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class GeneralSetting extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'site_name',
        'site_logo',
        'primary_color',
        'secondary_color',
        'dashboard_name',
        'dashboard_logo',
        'seo_title',
        'seo_description',
        'seo_keywords',
    ];

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('dashboard_logo')
            ->singleFile();
    }
}