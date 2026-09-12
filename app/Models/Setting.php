<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'logo',
        'email',
        'youtube',
        'instagram',
        'facebook',
        'twitter',
        'phone',
        'address',
    ];
}
