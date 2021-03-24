<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;
    public function train()
    {
        return $this->hasOne(Train::class);
    }
    public function station()
    {
        return $this->hasOne(Station::class);
    }
}
