<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $primaryKey = 'Doctor_id';

    protected $fillable = ['FirstName', 'MiddleName', 'LastName', 'Phone', 'Email', 'Password', 'Gender', 'Country', 'City', 'Street', 'Speciality'];

    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'Doctor_id');
    }

    public function medicalHistories()
    {
        return $this->hasMany(MedicalHistory::class, 'Doctor_id');
    }

    public function medications()
    {
        return $this->hasMany(Medication::class, 'Doctor_id');
    }

    public function vitalSignRecords()
    {
        return $this->hasMany(VitalSignRecord::class, 'Doctor_id');
    }
}
