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

    protected $appends = [
        'site_logo_url',
        'dashboard_logo_url',
    ];

    public function getSiteLogoUrlAttribute(): ?string
    {
        return $this->getFirstMediaUrl('site_logo');
    }

    public function getDashboardLogoUrlAttribute(): ?string
    {
        return $this->getFirstMediaUrl('dashboard_logo');
    }

    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('site_logo')
            ->singleFile();

        $this
            ->addMediaCollection('dashboard_logo')
            ->singleFile();
    }
}
