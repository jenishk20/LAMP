<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    public function trip()
    {
        return $this->hasOne(Trip::class,'id','trip_id');
    }

}
