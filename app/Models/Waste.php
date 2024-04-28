<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Waste extends Model
{

    protected $fillable = [
        'site',
        'year',
        'month',
        'waste_type',
        'estimated_quantity',
        'actual_quantity'
    ];
}
