<?php

namespace App\Http\Controllers;

use App\Models\Patient\Patient;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PatientApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patients = Patient::with('diagnostics')->paginate(10);

        return $patients;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validate_data = $request->validate([
                'document' => 'required|integer|unique:patients',
                'first_name' => 'required|string',
                'last_name' => 'required|string',
                'birth_date' => 'required|date',
                'email' => 'required|email',
                'phone' => 'required|integer',
                'genre' => ['required', Rule::in(['Male', 'Female'])],
            ]);

            Patient::create($validate_data);
            
            return response('El paciente se ha registrado correctamente', 200);
        } catch (\Throwable $th) {
            return response()->json(['title' => 'No se pudo registrar el paciente', 'errors' => $th->getMessage()],419);
        }
    }


    public function searchPatient(Request $request)
    {
        $query = Patient::query();
    
        if ($request->has('first_name')) {
            $query->where('first_name', 'LIKE', '%'.$request->first_name.'%');
        }
        
        if ($request->has('last_name')) {
            $query->where('last_name', 'LIKE', '%'.$request->last_name.'%');
        }
    
        if ($request->has('document')) {
            $query->where('document', 'LIKE', '%'.$request->document.'%');
        }
    
        $patients = $query->get();
    
        return response()->json($patients);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Patient $patient)
    {
        try {
            $validate_data = $request->validate([
                'document' => 'sometimes|integer|unique:patients',
                'first_name' => 'sometimes|string',
                'last_name' => 'sometimes|string',
                'birth_date' => 'sometimes|date',
                'email' => 'sometimes|email',
                'phone' => 'sometimes|integer',
                'genre' => ['sometimes', Rule::in(['Male', 'Female'])],
            ]);



        $patient->update($validate_data);
            
            return response('El paciente se ha actualizado correctamente', 200);
        } catch (\Throwable $th) {
            return response()->json(['title' => 'No se pudo actuaizar el paciente', 'errors' => $th->getMessage()],419);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $patient = Patient::findOrFail($id);
            
            $patient->diagnosticos()->delete();
            
            $patient->delete();
    
            return response()->json(['message' => 'El paciente y sus diagnósticos relacionados han sido eliminados correctamente'], 200);
        } catch (\Throwable $th) {
            return response()->json(['title' => 'Error al eliminar el paciente', 'errors' => $th->getMessage()], 419);
        }
    }
}
