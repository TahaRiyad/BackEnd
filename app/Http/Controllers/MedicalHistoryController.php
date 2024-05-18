<?php

namespace App\Http\Controllers;

use App\Models\MedicalHistory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MedicalHistoryController extends Controller
{

    public function index(): JsonResponse
    {
        $medicalHistories = MedicalHistory::all();
        return response()->json($medicalHistories);
    }

    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'Patient_id' => 'required|exists:patients,Patient_id',
            'Condition' => 'required',
            'Diagnosis_Date' => 'nullable',
            'Treatment' => 'nullable'
        ]);

        $medicalHistory = MedicalHistory::create($request->all());

        return response()->json([
            'message' => 'Medical history created successfully!',
            'medical_history' => $medicalHistory
        ], 201);
    }

    public function show($id): JsonResponse
    {
        $medicalHistory = MedicalHistory::find($id);
        if ($medicalHistory) {
            return response()->json($medicalHistory);
        }
        return response()->json(['message' => 'Medical history not found'], 404);
    }

    public function update(Request $request, $id): JsonResponse
    {
        $medicalHistory = MedicalHistory::find($id);
        if (!$medicalHistory) {
            return response()->json(['message' => 'Medical history not found'], 404);
        }

        $request->validate([
            'Patient_id' => 'sometimes|required|exists:patients,Patient_id',
            'Condition' => 'sometimes|required',
            'Diagnosis_Date' => 'nullable',
            'Treatment' => 'nullable'
        ]);

        $medicalHistory->update($request->all());

        return response()->json([
            'message' => 'Medical history updated successfully!',
            'medical_history' => $medicalHistory
        ]);
    }

    public function destroy($id): JsonResponse
    {
        $medicalHistory = MedicalHistory::find($id);
        if ($medicalHistory) {
            $medicalHistory->delete();
            return response()->json(['message' => 'Medical history deleted successfully']);
        }
        return response()->json(['message' => 'Medical history not found'], 404);
    }
}
