<?php

use App\Http\Controllers\DiagnosticsApiController;
use App\Http\Controllers\PatientApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::post('/tokens', function (Request $request) {
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    if (Auth::attempt($credentials)) {

        $token = $request->user()->createToken($request->email)->plainTextToken;
     
        return $token;
    }
});

Route::prefix('patients')->middleware('auth:sanctum')->group(function(){
    Route::resource('patient',PatientApiController::class);
    Route::post('searchPatient', [PatientApiController::class, 'searchPatient']);
});
Route::prefix('diagnostics')->middleware('auth:sanctum')->group(function(){
    Route::resource('diagnostic',DiagnosticsApiController::class);
    Route::get('diagnosticsImportants', [DiagnosticsApiController::class, 'diagnosticsImportants']);
    Route::post('setDiagnosticToPatient', [DiagnosticsApiController::class, 'setDiagnosticToPatient']);
});


