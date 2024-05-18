<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Medication;

class MedicationController extends Controller
{
    /**
     * Display all medications.
     */
    public function index(): JsonResponse
    {
        $medications = Medication::all();
        return response()->json($medications);
    }

    /**
     * Store a newly created medication in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'Name' => 'required',
            'Dosage' => 'required',
            'Frequency' => 'required',
            'Patient_id' => 'required|exists:patients,Patient_id',
            'Doctor_id' => 'required|exists:doctors,Doctor_id',
        ]);

        $medication = Medication::create($request->all());

        return response()->json([
            'message' => 'Medication created successfully!',
            'medication' => $medication
        ], 201);
    }

    /**
     * Display the specified medication.
     */
    public function show($id): JsonResponse
    {
        $medication = Medication::find($id);
        if ($medication) {
            return response()->json($medication);
        }
        return response()->json(['message' => 'Medication not found'], 404);
    }

    /**
     * Update the specified medication in storage.
     */
    public function update(Request $request, $id): JsonResponse
    {
        $medication = Medication::find($id);
        if (!$medication) {
            return response()->json(['message' => 'Medication not found'], 404);
        }

        $request->validate([
            'Name' => 'sometimes|required',
            'Dosage' => 'sometimes|required',
            'Frequency' => 'sometimes|required',
            'Patient_id' => 'sometimes|required|exists:patients,Patient_id',
            'Doctor_id' => 'sometimes|required|exists:doctors,Doctor_id',
        ]);

        $medication->update($request->all());

        return response()->json([
            'message' => 'Medication updated successfully!',
            'medication' => $medication
        ]);
    }

    /**
     * Remove the specified medication from storage.
     */
    public function destroy($id): JsonResponse
    {
        $medication = Medication::find($id);
        if ($medication) {
            $medication->delete();
            return response()->json(['message' => 'Medication deleted successfully']);
        }
        return response()->json(['message' => 'Medication not found'], 404);
    }

    /**
     * Get medications by patient ID.
     */
    public function getMedicationsByPatientID($patient_id): JsonResponse
    {
        $medications = Medication::where('Patient_id', $patient_id)->get();
        return response()->json($medications);
    }
}
