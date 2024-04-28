<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends Model
{
    protected $fillable = [
        'name'
    ];

    public function wastes(): HasMany
    {
        return $this->hasMany(Waste::class);
    }
}
