<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VitalSign extends Model
{
    protected $primaryKey = 'Vital_Sign_id';

    protected $fillable = ['Name', 'Unit'];
}
