<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Suplier extends Model
{
    protected $fillable = [
        'nit',
        'name',
        'email',
        'phone',
        'address',
    ];
}
