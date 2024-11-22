<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'description',
        'cas_urgent',
        'medecin_id',
        'patient_id',
        'prescription'
    ];

    public function medecin()
    {
        return $this->belongsTo(User::class, 'medecin_id');
    }

    public function patient()
    {
        return $this->belongsTo(User::class, 'patient_id');
    }
}
