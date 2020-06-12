<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PollutantIndex extends Model
{
    use SoftDeletes;
    protected $table = 'pollutant_indexes';
    protected $hidden = ['deleted_at'];
}
