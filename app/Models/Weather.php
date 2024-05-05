<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Weather extends Model
{
    use HasFactory;

    protected $fillable = ['uuid', 'city', 'weather', 'condition_image'];

    protected $casts = [
        'weather' => 'array'
    ];
}