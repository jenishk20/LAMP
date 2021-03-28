<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;
    public function train()
    {
        return $this->hasOne(Train::class,'id','train_id');
    }
    public function fetchSource()
    {
        return $this->hasOne(Station::class,'id','source_station_id');
    }
    public function fetchDestination()
    {
        return $this->hasOne(Station::class,'id','destination_station_id');
    }



}
