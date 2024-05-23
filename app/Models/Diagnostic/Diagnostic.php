<?php

namespace App\Models\Diagnostic;

use App\Models\Patient\Patient;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Diagnostic extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'description'
    ];
    protected $dates = [ 'deleted_at' ];

    public function patients()
    {
        return $this->belongsToMany(Patient::class, 'diagnostic_to_pacients', 'diagnostics_id', 'patient_id')
                    ->withTimestamps();
    }
}
