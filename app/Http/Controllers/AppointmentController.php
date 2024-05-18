<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'Appointment_date' => 'required|date',
            'Purpose' => 'required',
            'Doctor_id' => 'required|exists:doctors,Doctor_id',
            'Patient_id' => 'required|exists:patients,Patient_id'
        ]);

        $appointment = Appointment::create($request->all());

        return response()->json([
            'message' => 'Appointment created successfully!',
            'appointment' => $appointment
        ], 201);
    }

    public function getAllAppointments()
    {
        $appointments = Appointment::all();
        return response()->json($appointments);
    }

    public function getAppointmentByDoctorId($doctor_id)
    {
        $appointments = Appointment::where('Doctor_id', $doctor_id)->get();
        return response()->json($appointments);
    }

    public function getPatientAppointmentHistory($patient_id)
    {
        $appointments = Appointment::where('Patient_id', $patient_id)->get();
        return response()->json($appointments);
    }

    public function getAppointmentByDate(Request $request)
    {
        $request->validate([
            'date' => 'required|date'
        ]);

        $date = $request->input('date');

        $appointments = Appointment::whereDate('Appointment_date', $date)->get();
        return response()->json($appointments);
    }

    public function updateAppointment(Request $request, $id)
    {
        $appointment = Appointment::find($id);
        if (!$appointment) {
            return response()->json(['message' => 'Appointment not found'], 404);
        }

        $request->validate([
            'Appointment_date' => 'sometimes|required|date',
            'Purpose' => 'sometimes|required',
            'Doctor_id' => 'sometimes|required|exists:doctors,Doctor_id',
            'Patient_id' => 'sometimes|required|exists:patients,Patient_id'
        ]);

        $appointment->update($request->all());

        return response()->json([
            'message' => 'Appointment updated successfully!',
            'appointment' => $appointment
        ]);
    }

    public function deleteAppointment($id)
    {
        $appointment = Appointment::find($id);
        if (!$appointment) {
            return response()->json(['message' => 'Appointment not found'], 404);
        }

        $appointment->delete();

        return response()->json(['message' => 'Appointment deleted successfully']);
    }
}
