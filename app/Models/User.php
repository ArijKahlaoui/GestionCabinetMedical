<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = "users";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nom',
        'prenom',
        'telephone',
        'adresse',
        'genre',
        'specialite',
        'secu_social',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function roles() {
        return $this->belongsToMany(Role::class);
    }

    public function adminReclamations()
    {
        return $this->hasMany(Reclamation::class, 'admin_id');
    }

    public function patientReclamations()
    {
        return $this->hasMany(Reclamation::class, 'patient_id');
    }

    public function consultations()
    {
        return $this->hasMany(Consultation::class);
    }

    public function medecinContacts()
    {
        return $this->hasMany(Contact::class, 'medecin_id');
    }

    public function patientContacts()
    {
        return $this->hasMany(Contact::class, 'patient_id');
    }
}
