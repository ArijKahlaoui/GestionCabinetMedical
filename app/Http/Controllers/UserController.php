<?php

namespace App\Http\Controllers;

use App\Models\{
    User,
    Role
};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $users = User::all();
        if ($user && $user->roles->contains('nom', 'admin')) {
            return view('users.index',['users'=> $users]);
        } else {
            return view('404');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return view('users.create',['roles'=> $roles]);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $user = Auth::user();
        if ($user && $user->roles->contains('nom', 'admin')) {
        return view('users.show',['user' => $user]);
        } else {
            return view('404');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        return view('users.edit',['user' => $user,'roles'=>$roles]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request-> validate([
            'nom' => 'required|string|max:25',
            'prenom' => 'required|string|max:25',
            'telephone' => 'required|string|min:8|max:8',
            'adresse' => 'required',
            'specialite' => 'required_if:roles,medecin',
            'secu_social' => 'required_if:roles,patient',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);
        $user->update($request->all());

        return redirect()->route('profile')->with("success", "Utilisateur mis à jour avec succès.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->roles()->detach();
        $user->delete();
        return redirect()->route('users.index')->with("success", "Utilisateur supprimé avec succès.");
    }

    



}
