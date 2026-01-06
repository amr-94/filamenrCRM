<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
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
