<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = \App\Models\User::create([
        'id' => '1',
        'nom' => 'Admin',
        'prenom' => 'ADM',
        'telephone' => '0123456789',
        'adresse' => '123 Rue de la liberte',
        'genre' => 'homme', 
        'specialite' => '', 
        'secu_social' => '',
        'email' => 'admin@gmail.com',
        'password' => bcrypt('123456789'),
    ]);
    
    \App\Models\Role::create(['nom'=> 'admin']);
    \App\Models\Role::create(['nom'=> 'medecin']);
    \App\Models\Role::create(['nom'=> 'patient']);

    $adminRole = \App\Models\Role::where('nom', 'admin')->first();
    if ($adminRole) {
        $user->roles()->attach($adminRole);
    }

    $user1 = \App\Models\User::create([
        'id' => '2',
        'nom' => 'Mohamed',
        'prenom' => 'MED',
        'telephone' => '23456789',
        'adresse' => 'Tunis',
        'genre' => 'homme', 
        'specialite' => 'cardio', 
        'secu_social' => '',
        'email' => 'md@gmail.com',
        'password' => bcrypt('123456'),
    ]);
    $medecinRole = \App\Models\Role::where('nom', 'medecin')->first();
    if ($medecinRole) {
        $user1->roles()->attach($medecinRole);
    }

    $user3 = \App\Models\User::create([
        'id' => '4',
        'nom' => 'Hana',
        'prenom' => 'Amara',
        'telephone' => '25369874',
        'adresse' => 'Sfax',
        'genre' => 'femme', 
        'specialite' => 'dermatologue', 
        'secu_social' => '',
        'email' => 'hana@gmail.com',
        'password' => bcrypt('1234567'),
    ]);
    $medecinRole = \App\Models\Role::where('nom', 'medecin')->first();
    if ($medecinRole) {
        $user3->roles()->attach($medecinRole);
    }

    $user2 = \App\Models\User::create([
        'id' => '3',
        'nom' => 'Ali',
        'prenom' => 'BenAli',
        'telephone' => '50142398',
        'adresse' => '21 rue ennouhoud',
        'genre' => 'homme', 
        'specialite' => '', 
        'secu_social' => '124578',
        'email' => 'ali@gmail.com',
        'password' => bcrypt('124578'),
    ]);
    $patientRole = \App\Models\Role::where('nom', 'patient')->first();
    if ($patientRole) {
        $user2->roles()->attach($patientRole);
    }

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
