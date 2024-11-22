<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Reclamation extends Model
{
    use HasFactory, Notifiable;
    protected $fillable = [
        'Subject',
        'message',
        'decision'
    ];

    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }

    public function medecin()
    {
        return $this->belongsTo(User::class, 'medecin_id');
    }
}
