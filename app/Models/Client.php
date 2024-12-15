<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'ci',
        'name',
        'email',
        'phone',
        'address',
    ];
}
