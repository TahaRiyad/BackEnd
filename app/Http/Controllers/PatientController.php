<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index()
    {
        $patients = Patient::all();
        return response()->json($patients);
    }

    public function store(Request $request)
    {
        $request->validate([
            'FirstName' => 'required',
            'MiddleName' => 'nullable',
            'LastName' => 'required',
            'Email' => 'required|email|unique:patients',
            'Password' => 'required',
            'Phone' => 'required',
            'Gender' => 'required|in:M,F',
            'Country' => 'required',
            'City' => 'required',
            'Street' => 'required'
        ]);

        $patient = new Patient([
            'FirstName' => $request->input('FirstName'),
            'MiddleName' => $request->input('MiddleName'),
            'LastName' => $request->input('LastName'),
            'Phone' => $request->input('Phone'),
            'Email' => $request->input('Email'),
            'Password' => bcrypt($request->input('Password')),
            'Gender' => $request->input('Gender'),
            'Country' => $request->input('Country'),
            'City' => $request->input('City'),
            'Street' => $request->input('Street')
        ]);
        $patient->save();

        return response()->json([
            'message' => 'Patient created successfully!',
            'patient' => $patient
        ], 201);
    }

    public function show($id)
    {
        $patient = Patient::find($id);
        if ($patient) {
            return response()->json($patient);
        }
        return response()->json(['message' => 'Patient not found'], 404);
    }

    public function update(Request $request, $id)
    {
        $patient = Patient::find($id);
        if (!$patient) {
            return response()->json(['message' => 'Patient not found'], 404);
        }
    
        $request->validate([
            'Email' => 'email|unique:patients,Email,' . $id . ',Patient_id',
            'Password' => 'sometimes|required',
            'FirstName' => 'sometimes|required',
            'MiddleName' => 'nullable',
            'LastName' => 'sometimes|required',
            'Phone' => 'sometimes|required',
            'Gender' => 'sometimes|required|in:M,F',
            'Country' => 'sometimes|required',
            'City' => 'sometimes|required',
            'Street' => 'sometimes|required'
        ]);
    
        $patient->update($request->all());
    
        return response()->json([
            'message' => 'Patient updated successfully!',
            'patient' => $patient
        ]);
    }
    

    public function destroy($id)
    {
        $patient = Patient::find($id);
        if ($patient) {
            $patient->delete();
            return response()->json(['message' => 'Patient deleted successfully']);
        }
        return response()->json(['message' => 'Patient not found'], 404);
    }
}
