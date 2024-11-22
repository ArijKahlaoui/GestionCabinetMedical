<?php

namespace App\Http\Controllers;

use App\Models\Reclamation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReclamationController extends Controller
{
    // afficher la liste des réclamations
    public function index()
    {
        $medecinId = Auth::id();

        $reclamations = Reclamation::where('medecin_id', $medecinId)->get();

        return view('reclamations.liste', compact('reclamations'));
    }

    //afficher le formulaire de reclamation
    public function create()
    {
        return view('reclamations.ajouter');
    }

    public function store(Request $request)
    {
        // Valider les données du formulaire (ajoutez des règles de validation selon vos besoins)
        $data= new Reclamation; 

        $data->Subject=$request->Subject;
        $data->message=$request->message;
        $data->admin_id = 1;
        $data->medecin_id = Auth::id();

        $data->save();

        return redirect()->back()->with('message', 'Réclamation envoyée avec succès.');
    }


    //Admin 
    public function allReclamations()
    {
        $reclamations = Reclamation::all(); // Récupère toutes les réclamations

        return view('reclamations.admin.liste', compact('reclamations'));
    }

    public function repondre(Request $request)
    {
        $reclamationId = $request->input('reclamation_id');

        $reclamation = Reclamation::findOrFail($reclamationId);

        $validatedData = $request->validate([
            'decision' => 'required|string',
        ]);
        
        $reclamation->decision = $validatedData['decision'];
        $reclamation->save();

        return redirect()->route('reclamations.admin.liste')->with('message', 'Décision ajoutée avec succès à la réclamation.');
    }
}
