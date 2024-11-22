<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Contact extends Model
{
    use HasFactory, Notifiable;
    protected $fillable = [
        'expediteur',
        'destinataire',
        'Subject',
        'message',
        'date',
    ];

    public function notification()
    {
        return $this->hasOne(Notification::class);
    }
}
