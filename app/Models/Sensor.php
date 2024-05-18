<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sensor extends Model
{
    protected $primaryKey = 'Sensor_id';

    protected $fillable = ['Type', 'Status'];
}
