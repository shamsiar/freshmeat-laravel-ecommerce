<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Logistic extends Model
{
    use HasFactory, SoftDeletes;

    public function cities()
    {
        return $this->hasMany(LogisticZoneCity::class);
    }
}
