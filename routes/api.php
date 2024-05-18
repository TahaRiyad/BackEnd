<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\MedicalHistoryController;
use App\Http\Controllers\MedicationController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\SensorController;
use App\Http\Controllers\VitalSignController;
use App\Http\Controllers\VitalSignRecordController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', static function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::resource('patients', PatientController::class);
Route::resource('doctors', DoctorController::class);
Route::resource('medical-histories', MedicalHistoryController::class);
Route::resource('medications', MedicationController::class);
Route::resource('sensors', SensorController::class);
Route::resource('vital-signs', VitalSignController::class);
Route::resource('vital-sign-records', VitalSignRecordController::class);


Route::group([
    'controller' => AppointmentController::class,
    'prefix' => 'appointments',
], static function () {
    Route::post('/', 'create');
    Route::get('/', 'getAllAppointments');
    Route::get('/doctor/{doctor_id}', 'getAppointmentByDoctorId');
    Route::get('/patient/{patient_id}', 'getPatientAppointmentHistory');
    Route::get('/date', 'getAppointmentByDate');
    Route::delete('/{id}', 'deleteAppointment');
    Route::put('/{id}', 'updateAppointment');
});

Route::get('/medications/patient/{patient_id}', [MedicationController::class, 'getMedicationsByPatientID']);

Route::group([
    'prefix' => 'auth',
    'controller' => AuthController::class,
], static function () {
    Route::post('/register', 'register');
    Route::post('/login', 'login');
    Route::post('/logout', 'logout')->middleware('auth:sanctum');
    Route::delete('/delete', 'destroy')->middleware('auth:sanctum');
});

Route::group([
    'prefix' => 'password',
    'controller' => PasswordController::class,
], static function () {
    Route::post('/update', 'updatePassword')->middleware('auth:sanctum');
    Route::post('/forgot', 'forgotPassword');
    Route::post('/reset', 'resetPassword');
});
