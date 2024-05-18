<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index(): JsonResponse
    {
        $doctors = Doctor::all();
        return response()->json($doctors);
    }

    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'FirstName' => 'required',
            'MiddleName' => 'nullable', // 'nullable' means 'optional'
            'LastName' => 'required',
            'Email' => 'required|email|unique:doctors',
            'Password' => 'required',
            'Phone' => 'required',
            'Gender' => 'required|in:M,F',
            'Country' => 'required',
            'City' => 'required',
            'Street' => 'required',
            'Speciality' => 'required'
        ]);

        $doctor = Doctor::create($request->all());

        return response()->json([
            'message' => 'Doctor created successfully!',
            'doctor' => $doctor
        ], 201);
    }

    public function show(int $id): JsonResponse
    {
        $doctor = Doctor::find($id);
        if ($doctor) {
            return response()->json($doctor);
        }
        return response()->json(['message' => 'Doctor not found'], 404);
    }

    public function update(Request $request, $id): JsonResponse
    {
        $doctor = Doctor::find($id);
        if (!$doctor) {
            return response()->json(['message' => 'Doctor not found'], 404);
        }

        $request->validate([
            'Email' => 'email|unique:doctors,Email,' . $id . ',Doctor_id',
            'Password' => 'sometimes|required',
            'FirstName' => 'sometimes|required',
            'MiddleName' => 'nullable',
            'LastName' => 'sometimes|required',
            'Phone' => 'sometimes|required',
            'Gender' => 'sometimes|required|in:M,F',
            'Country' => 'sometimes|required',
            'City' => 'sometimes|required',
            'Street' => 'sometimes|required',
            'Speciality' => 'sometimes|required'
        ]);

        $doctor->update($request->all());

        return response()->json([
            'message' => 'Doctor updated successfully!',
            'doctor' => $doctor
        ]);
    }

    public function destroy(int $id): JsonResponse
    {
        $doctor = Doctor::find($id);
        if ($doctor) {
            $doctor->delete();
            return response()->json(['message' => 'Doctor deleted successfully']);
        }
        return response()->json(['message' => 'Doctor not found'], 404);
    }
}
