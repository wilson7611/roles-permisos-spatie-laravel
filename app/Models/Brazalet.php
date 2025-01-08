<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brazalet extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price_brazalete',
        'status'
    ];
}
