<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WeatherIndex extends Model
{
    use SoftDeletes;
    protected $table = 'weather_indexes';
    protected $hidden = ['deleted_at'];
}