<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ConsultationController extends Controller
{
    //afficher le formulaire de reclamation
    public function create($patient)
    {
        $patientDetails = User::findOrFail($patient);
        return view('consultation.ajouterConsultation', compact('patientDetails'));
    }
    public function ajouterConsultation(Request $request)
    {
        $data= new Consultation;

        if ($request->hasFile('prescription')) {
            $prescriptionFile = $request->file('prescription');
            $prescriptionFileName = $prescriptionFile->getClientOriginalName();
            $prescriptionPath = $prescriptionFile->storeAs('public/prescriptions', $prescriptionFileName);
            $data->prescription = 'storage/prescriptions/' . $prescriptionFileName;
        }

        $data->date=$request->date;
        $data->description=$request->description;
        $data->cas_urgent=$request->cas_urgent;
        $data->patient_id=$request->patient_id;
        $data->medecin_id = Auth::id();

        $data->save();

        return redirect()->back()->with('message', 'Consultation ajoutée avec succès.');
    }

    public function listeConsultationsPatient($patientId)
    {
        // Récupérez les consultations pour le patient spécifié
        $consultations = Consultation::where('patient_id', $patientId)->orderBy('date', 'asc')->get();
       
        $patient = User::findOrFail($patientId);

        // Chargez la vue pour afficher la liste des consultations du patient
        return view('consultation.listeConsultation', compact('consultations','patient'));
    }

    public function listeConsultationsMedecin($patientId,$medecinId)
    {
        // Récupérez les consultations pour le patient spécifié
        $consultations = Consultation::where('patient_id', Auth::user()->id)->Where('medecin_id', $medecinId)->orderBy('date', 'asc')->get();
       
        $patient = User::findOrFail(Auth::user()->id);

        // Chargez la vue pour afficher la liste des consultations du patient
        return view('consultation.listeConsultation', compact('consultations','patient'));
    }
}
