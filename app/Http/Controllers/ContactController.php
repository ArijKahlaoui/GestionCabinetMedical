<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\User;
use App\Notifications\NewMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
class ContactController extends Controller
{
    public function contact($med)
    {
        $medecin = User::findOrFail($med);
        return view('patient.contact.EnvoyerMesssage', compact('medecin'));
    }

    public function store(Request $request)
    {
        // Valider les données du formulaire (ajoutez des règles de validation selon vos besoins)
        $data= new Contact(); 

        $data->expediteur = Auth::id();
        $data->destinataire=$request->destinataire;
        $data->Subject=$request->Subject;
        $data->message=$request->message;
        $data->date= now();


        $data->save();

        $message = $data->message;
        $destinataire = $data->expediteur;
        Notification::send( User::find($data->destinataire), new NewMessage($message,$destinataire));

        return redirect()->back()->with('message', 'Message envoyée avec succès.');
    }

    public function showDiscussion($destinataireId)
    {
        $expediteurId= Auth::id();
        // Récupérez l'expéditeur et le destinataire
        $expediteur = User::findOrFail($expediteurId);
        $destinataire = User::findOrFail($destinataireId);

        // Récupérez les messages de la discussion
        $messages = Contact::where(function ($query) use ($expediteurId, $destinataireId) {
            $query->where('expediteur', $expediteurId)
                ->where('destinataire', $destinataireId);
        })->orWhere(function ($query) use ($expediteurId, $destinataireId) {
            $query->where('expediteur', $destinataireId)
                ->where('destinataire', $expediteurId);
        })->orderBy('date', 'asc')->get();

        // Affichez la vue avec les données
        return view('patient.contact.listeMessage', compact('expediteur', 'destinataire', 'messages'));
    }

   

}