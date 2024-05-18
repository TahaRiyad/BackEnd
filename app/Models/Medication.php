<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medication extends Model
{
    protected $primaryKey = 'Medication_id';

    protected $fillable = ['Name', 'Dosage', 'Frequency', 'Patient_id', 'Doctor_id'];

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'Patient_id');
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'Doctor_id');
    }
}
