<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VitalSignRecord extends Model
{
    protected $primaryKey = 'Record_id';

    protected $fillable = ['Patient_id', 'Sensor_id', 'Vital_Sign_id', 'Doctor_id', 'Value', 'Time_Stamp'];

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'Patient_id');
    }

    public function sensor()
    {
        return $this->belongsTo(Sensor::class, 'Sensor_id');
    }

    public function vitalSign()
    {
        return $this->belongsTo(VitalSign::class, 'Vital_Sign_id');
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'Doctor_id');
    }
}
