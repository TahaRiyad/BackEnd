<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VitalSign;

class VitalSignController extends Controller
{
    /**
     * Display all vital signs.
     */
    public function index()
    {
        $vitalSigns = VitalSign::all();
        return response()->json($vitalSigns);
    }

    /**
     * Store a newly created vital sign in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Name' => 'required',
            'Unit' => 'required',
        ]);

        $vitalSign = VitalSign::create($request->all());

        return response()->json([
            'message' => 'Vital sign created successfully!',
            'vital_sign' => $vitalSign
        ], 201);
    }

    /**
     * Display the specified vital sign.
     */
    public function show($id)
    {
        $vitalSign = VitalSign::find($id);
        if ($vitalSign) {
            return response()->json($vitalSign);
        }
        return response()->json(['message' => 'Vital sign not found'], 404);
    }

    /**
     * Update the specified vital sign in storage.
     */
    public function update(Request $request, $id)
    {
        $vitalSign = VitalSign::find($id);
        if (!$vitalSign) {
            return response()->json(['message' => 'Vital sign not found'], 404);
        }

        $request->validate([
            'Name' => 'sometimes|required',
            'Unit' => 'sometimes|required',
        ]);

        $vitalSign->update($request->all());

        return response()->json([
            'message' => 'Vital sign updated successfully!',
            'vital_sign' => $vitalSign
        ]);
    }

    /**
     * Remove the specified vital sign from storage.
     */
    public function destroy($id)
    {
        $vitalSign = VitalSign::find($id);
        if ($vitalSign) {
            $vitalSign->delete();
            return response()->json(['message' => 'Vital sign deleted successfully']);
        }
        return response()->json(['message' => 'Vital sign not found'], 404);
    }
}
