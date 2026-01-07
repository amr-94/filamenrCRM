<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContactMessage extends Model
{
    // use SoftDeletes;
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'company_name',
        'number_of_locations',
        'message',
        'status',
    ];
}
