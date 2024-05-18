<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sensor;

class SensorController extends Controller
{
    /**
     * Display all sensors.
     */
    public function index()
    {
        $sensors = Sensor::all();
        return response()->json($sensors);
    }

    /**
     * Store a newly created sensor in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Type' => 'required',
            'Status' => 'required',
        ]);

        $sensor = Sensor::create($request->all());

        return response()->json([
            'message' => 'Sensor created successfully!',
            'sensor' => $sensor
        ], 201);
    }

    /**
     * Display the specified sensor.
     */
    public function show($id)
    {
        $sensor = Sensor::find($id);
        if ($sensor) {
            return response()->json($sensor);
        }
        return response()->json(['message' => 'Sensor not found'], 404);
    }

    /**
     * Update the specified sensor in storage.
     */
    public function update(Request $request, $id)
    {
        $sensor = Sensor::find($id);
        if (!$sensor) {
            return response()->json(['message' => 'Sensor not found'], 404);
        }

        $request->validate([
            'Type' => 'sometimes|required',
            'Status' => 'sometimes|required',
        ]);

        $sensor->update($request->all());

        return response()->json([
            'message' => 'Sensor updated successfully!',
            'sensor' => $sensor
        ]);
    }

    /**
     * Remove the specified sensor from storage.
     */
    public function destroy($id)
    {
        $sensor = Sensor::find($id);
        if ($sensor) {
            $sensor->delete();
            return response()->json(['message' => 'Sensor deleted successfully']);
        }
        return response()->json(['message' => 'Sensor not found'], 404);
    }
}
