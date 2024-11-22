<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class RendezVous extends Model
{
    use HasFactory;
    use Notifiable;

    protected $fillable = [
        'nom',
        'email',
        'date',
        'medecin_id',
        'telephone',
        'message',
        'etat',
        'symptomes',
    ];

    public function patient()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function medecin()
    {
        return $this->belongsTo(User::class, 'medecin_id');
    }
    
    public function notification()
    {
        return $this->hasOne(Notification::class);
    }
}
