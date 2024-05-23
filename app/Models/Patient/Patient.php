<?php

namespace App\Models\Patient;

use App\Models\Diagnostic\Diagnostic;
use App\Models\Diagnostic\DiagnosticToPacient;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patient extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'document',
        'first_name',
        'last_name',
        'birth_date',
        'email',
        'phone',
        'genre'
    ];

    protected $dates = [ 'deleted_at' ];
    

    public function diagnostics()
    {
        return $this->belongsToMany(Diagnostic::class, 'diagnostic_to_pacients', 'patient_id', 'diagnostics_id')
                    ->withTimestamps();
    }
}
