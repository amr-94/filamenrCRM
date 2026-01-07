<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeatureItem extends Model
{
    protected $fillable = [
        'feature_section_id',
        'title',
        'icon',
        'order',
    ];

    public function section()
    {
        return $this->belongsTo(FeatureSection::class, 'feature_section_id');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->order)) {
                $model->order = static::where('feature_section_id', $model->feature_section_id)->max('order') + 1;
            }
        });
    }
}
