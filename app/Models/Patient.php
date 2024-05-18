<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $primaryKey = 'Patient_id';

    protected $fillable = ['FirstName', 'MiddleName', 'LastName', 'Phone', 'Email', 'Password', 'Gender', 'Country', 'City', 'Street'];

    public function medications()
    {
        return $this->hasMany(Medication::class, 'Patient_id');
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'Patient_id');
    }

    public function medicalHistories()
    {
        return $this->hasMany(MedicalHistory::class, 'Patient_id');
    }

    public function vitalSignRecords()
    {
        return $this->hasMany(VitalSignRecord::class, 'Patient_id');
    }
}
