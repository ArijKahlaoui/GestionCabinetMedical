<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use App\Models\RendezVous;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class PatientController extends Controller
{
    //liste des rendez-vous
    public function show(){
        $patientId = Auth::id();
        $data = RendezVous::where('user_id', $patientId)->get();
        $nombreRendezVous = $data->count();
      
      return view('patient.appointments', compact('data','nombreRendezVous'));
    }

    //afficher le formulaire de prise du rendez-vous par un patient
    public function appointment(){
        $symptomes = ['Fievre', 'Douleur abdominale', 'Maux de tete', 'Essoufflement','Vomissements','Insomnie','Douleur musculaire'];
        $user = Auth::user();
        
        if ($user && $user->roles->contains('nom', 'patient')) {
            $medecins = User::whereHas('roles', function ($query) {
                $query->where('nom', 'medecin');
            })->get();
    
            return view('patient.ajouterRendezVous', ['user' => $user, 'medecins' => $medecins], compact('symptomes'));
        } else {
            return view('404');
        }
    }

    //ajouter rendez-vous
    public function appointmentPost(Request $request){
        // Créez une nouvelle instance de RendezVous
        $data = new RendezVous; 
        $symptomes = $request->input('symptomes', []);
        $symptomesJSON = json_encode($symptomes);
        // Remplissez les attributs avec les données du formulaire
        $data->nom = $request->nom;
        $data->email = $request->email;
        $data->date = $request->date;
        $data->medecin_id = $request->medecin_id;
        $data->telephone = $request->telephone;
        $data->message = $request->message;
        $data->etat = 'En cours';
        $data->symptomes = $symptomesJSON;
        // Vérifiez si l'utilisateur est connecté
        if (Auth::id()) {
            $data->user_id = Auth::user()->id;
        }
    
        // Enregistrez le rendez-vous
        $data->save();
    
        // Redirigez avec un message de succès
        return redirect()->back()->with('message', 'Votre demande de rendez-vous a été enregistrée avec succès. Nous prendrons contact avec vous bientôt.');
    }
    

    //afficher le detail du rendez-vous
    public function showAppointment($id)
    {
        $appoint = RendezVous::findOrFail($id);
        return view('patient.fichierPatient', compact('appoint'));
    }

    //supprimer un rendez-vous
    public function deleteAppointment($id){

        $data= RendezVous::find($id)->delete();
        return back();
    }

    //afficher le liste des medecins
    public function listDoctors()
    {
        $doctors = User::whereHas('roles', function ($query) {
            $query->where('nom', 'medecin');
        })->get();
        
        return view('patient.medecins', compact('doctors'));
    }

    public function index($doctorId){
        $acceptedAppointments = $this->getAcceptedAppointments($doctorId);
        $events = [];
        foreach ($acceptedAppointments as $appointment) {
        $backgroundColor = 'green';
        
        $events[] = [
            'title' => 'Rendez-vous accepté',
            'start' => $appointment->date,
            'backgroundColor' => $backgroundColor,
            'borderColor' => $backgroundColor,
        ];
        }
        return view('patient.calendar', compact('events','doctorId'));
    }

    public function getAcceptedAppointments($doctorId) {
        return RendezVous::where('medecin_id', $doctorId)
            ->where('etat', 'Accepté')
            ->get();
    }

}
