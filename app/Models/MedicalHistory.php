<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MedicalHistory extends Model
{
    protected $primaryKey = 'History_id';

    protected $fillable = ['Patient_id', 'Condition', 'Diagnosis_Date', 'Treatment'];

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'Patient_id');
    }
}
