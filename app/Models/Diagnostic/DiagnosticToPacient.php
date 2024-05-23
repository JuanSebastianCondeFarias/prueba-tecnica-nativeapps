<?php

namespace App\Models\Diagnostic;

use App\Models\Patient\Patient;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DiagnosticToPacient extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'patient_id',
        'diagnostics_id',
        'observations'
    ];

    protected $dates = [ 'deleted_at' ];
    
    public function patient(){
        return $this->belongsTo(Patient::class, 'patiend_id', 'id');
    }

    public function diagnostic(){
        return $this->belongsTo(Diagnostic::class, 'diagnostic_id', 'id');
    }
}
