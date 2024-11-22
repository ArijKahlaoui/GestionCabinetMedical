<?php

namespace App\Http\Controllers;

use App\Models\RendezVous;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\DateChangeNotification;
use Illuminate\Support\Facades\Notification;

class DoctorController extends Controller
{
    //afficher la liste des rendez-vous d'un medecin
    public function show(){
      $doctorId = Auth::id();
      $data = RendezVous::where('medecin_id', $doctorId)->get();
    
      return view('doctor.appointments', compact('data'));
    } 

    public function approved($id){
      $data= RendezVous::find($id);
      $data->etat='Accepté';
      $data->save();
      return back();
    }
    public function diapproved($id){
      $data= RendezVous::find($id);
      $data->etat='Refusé';
      $data->save();
      return back();
 
  }

  public function search (Request $request){
   
    $query= $request->get('query');

    $searched_item = User::where('specialite', 'LIKE', '%' .$query. '%')->orwhere('nom', 'LIKE', '%'.$query. '%')->orwhere('prenom', 'LIKE', '%'.$query. '%')->orwhere('adresse', 'LIKE', '%'.$query. '%')->get();
  
    return view('search', compact('searched_item','query'));
  }

  public function patients()
  {
      $rendezVousApprouves = RendezVous::where('etat', 'Accepté')->get();

      $patients = [];

      foreach ($rendezVousApprouves as $rendezVous) {
        $patients[] = $rendezVous->patient;
      }
    return view('doctor.liste_patients', ['patients' => $patients]);
  }
  
  public function edit(RendezVous $rendezvous)
  {
      return view('doctor.modifierAppointment', compact('rendezvous'));
  }

    public function update(Request $request, RendezVous $rendezvous)
    {
      $request->validate([
            'date' ,
            'etat' 
      ]);

      $oldDate = $rendezvous->date;

      $rendezvous->update($request->all());

      if ($oldDate != $rendezvous->date) {
        $user = $rendezvous->patient;
        $message = 'La date de votre rendez-vous a été modifiée. Veuillez visiter Vos rendez-vous.';
        Notification::send($user, new DateChangeNotification($message));
      }

      return redirect()->back()->with('message', 'Rendez-vous mis à jour avec succès.');
    }

}
