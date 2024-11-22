<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class AuthManager extends Controller
{
    function login(){
        if(Auth::check()){
            return redirect(route('profile'));
        }
        return view('login');
    }

    function loginPost(Request $request){
        $request-> validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        
        $credentials = $request ->only('email','password');
        if(Auth::attempt($credentials)){
            return redirect()->intended(route('profile'));
        }

        return redirect(route('login'))->with("error", "email ou mot de passe non valide");
    }

    function inscription(){
        if(Auth::check()){
            return redirect(route('profile'));
        }
        $roles = Role::all();
        return view('inscription',['roles'=> $roles]);
    }

    function inscriptionPost(Request $request){
        $request-> validate([
            'nom' => 'required|string|max:25',
            'prenom' => 'required|string|max:25',
            'telephone' => 'required|string|min:8|max:8',
            'adresse' => 'required',
            'genre' => '',
            'specialite' => 'required_if:roles,medecin',
            'secu_social' => 'required_if:roles,patient',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6|max:8',
            'roles' => 'required',
        ]);

        $data['nom'] = $request -> nom;
        $data['prenom'] = $request -> prenom;
        $data['telephone'] = $request -> telephone;
        $data['adresse'] = $request -> adresse;
        $data['genre'] = $request -> genre;
        $data['specialite'] = $request->specialite;
        $data['secu_social'] = $request->secu_social;
        $data['email'] = $request -> email;
        $data['password'] = Hash::make($request -> password);

        $user = User::create($data);
        $user->roles()->attach($request->input('roles'));
        if(!$user){
            return redirect(route('inscription'))->with("error", "Inscription non valide, réessayez");
        }
        
        return redirect(route('login'))->with("success", "Inscription valide.");
    }

    function logout(){
        Session::flush();
        Auth::logout();
        return redirect(route('login'));
    }

    public function showDashboard()
    {
        $user = Auth::user();
        $usersCount = User::count();
        $medecinsCount = User::whereHas('roles', function ($query) {
            $query->where('nom', 'medecin');
        })->count();
        $patientsCount = User::whereHas('roles', function ($query) {
            $query->where('nom', 'patient');
        })->count();

        if ($user && $user->roles->contains('nom', 'admin')) {
            return view('dashboard',['usersCount' => $usersCount,'medecinsCount' => $medecinsCount,'patientsCount' =>$patientsCount]);
        } else {
            return view('404');
        }
    }

}
