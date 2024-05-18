<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $primaryKey = 'Appointment_id';

    protected $fillable = ['Appointment_date', 'Purpose', 'Doctor_id', 'Patient_id'];

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'Patient_id');
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'Doctor_id');
    }
}
