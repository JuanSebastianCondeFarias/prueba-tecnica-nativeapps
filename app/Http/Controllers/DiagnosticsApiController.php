<?php

namespace App\Http\Controllers;

use App\Models\Diagnostic\Diagnostic;
use App\Models\Diagnostic\DiagnosticToPacient;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DiagnosticsApiController extends Controller
{
    public function store(Request $request)
    {
        try {
            
            Diagnostic::create($request->toArray());
            
            return response('El diagnostico se ha registrado correctamente', 200);
        } catch (\Throwable $th) {
            return response()->json(['title' => 'No se pudo registrar el diagnostico', 'errors' => $th->getMessage()],419);
        }
    }

    public function setDiagnosticToPatient(Request $request)
    {
        try {
                 
            $validate_data = $request->validate([
                'patient_id' => 'required',
                'diagnostics_id' => 'required',
                'observations' => 'sometimes'
            ]);
            DiagnosticToPacient::create($validate_data);
            
            return response('El diagnostico se ha asignado correctamente', 200);
        } catch (\Throwable $th) {
            return response()->json(['title' => 'No se pudo asignar el diagnostico', 'errors' => $th->getMessage()],419);
        }
    }

    public function diagnosticsImportants(){

        $topDiagnosticos =  DiagnosticToPacient::select('diagnostics.name', DB::raw('count(diagnostic_to_pacients.diagnostics_id) as sum_diagnostics'))
            ->join('diagnostics', 'diagnostic_to_pacients.diagnostics_id', '=', 'diagnostics.id')
            ->where('diagnostic_to_pacients.created_at', '>=', Carbon::now()->subMonths(6))
            ->groupBy('diagnostics.name')
            ->orderByDesc('sum_diagnostics')
            ->limit(5)
            ->get();

        return response()->json($topDiagnosticos);
    }
}
