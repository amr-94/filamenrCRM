<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class ReachUs extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia;

    protected $table = 'reach_us';

    protected $fillable = [
        'contact_type',
        'title',
        'value',
        'icon',
        'order',
        'is_active',
        'created_by',
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

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
