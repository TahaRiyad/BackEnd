<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VitalSignRecord;

class VitalSignRecordController extends Controller
{
    /**
     * Display all vital sign records.
     */
    public function index()
    {
        $vitalSignRecords = VitalSignRecord::all();
        return response()->json($vitalSignRecords);
    }

    /**
     * Store a newly created vital sign record in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Patient_id' => 'required|exists:patients,Patient_id',
            'Sensor_id' => 'required|exists:sensors,Sensor_id',
            'Vital_Sign_id' => 'required|exists:vital_signs,Vital_Sign_id',
            'Doctor_id' => 'required|exists:doctors,Doctor_id',
            'Value' => 'required',
            'Time_Stamp' => 'required|date',
        ]);

        $vitalSignRecord = VitalSignRecord::create($request->all());

        return response()->json([
            'message' => 'Vital sign record created successfully!',
            'vital_sign_record' => $vitalSignRecord
        ], 201);
    }

    /**
     * Display the specified vital sign record.
     */
    public function show($id)
    {
        $vitalSignRecord = VitalSignRecord::find($id);
        if ($vitalSignRecord) {
            return response()->json($vitalSignRecord);
        }
        return response()->json(['message' => 'Vital sign record not found'], 404);
    }

    /**
     * Update the specified vital sign record in storage.
     */
    public function update(Request $request, $id)
    {
        $vitalSignRecord = VitalSignRecord::find($id);
        if (!$vitalSignRecord) {
            return response()->json(['message' => 'Vital sign record not found'], 404);
        }

        $request->validate([
            'Patient_id' => 'sometimes|required|exists:patients,Patient_id',
            'Sensor_id' => 'sometimes|required|exists:sensors,Sensor_id',
            'Vital_Sign_id' => 'sometimes|required|exists:vital_signs,Vital_Sign_id',
            'Doctor_id' => 'sometimes|required|exists:doctors,Doctor_id',
            'Value' => 'sometimes|required',
            'Time_Stamp' => 'sometimes|required|date',
        ]);

        $vitalSignRecord->update($request->all());

        return response()->json([
            'message' => 'Vital sign record updated successfully!',
            'vital_sign_record' => $vitalSignRecord
        ]);
    }

    /**
     * Remove the specified vital sign record from storage.
     */
    public function destroy($id)
    {
        $vitalSignRecord = VitalSignRecord::find($id);
        if ($vitalSignRecord) {
            $vitalSignRecord->delete();
            return response()->json(['message' => 'Vital sign record deleted successfully']);
        }
        return response()->json(['message' => 'Vital sign record not found'], 404);
    }
}
