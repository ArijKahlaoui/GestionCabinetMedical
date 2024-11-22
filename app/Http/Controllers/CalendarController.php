<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\RendezVous;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class CalendarController extends Controller
{
  public function getAcceptedAppointments($doctorId) {
    return RendezVous::where('medecin_id', $doctorId)
        ->where('etat', 'Accepté')
        ->get();
  }

  public function index(){
    $doctorId = Auth::id();
    $acceptedAppointments = $this->getAcceptedAppointments($doctorId);
    $events = [];
    foreach ($acceptedAppointments as $appointment) {
      $events[] = [
          'title' => 'Rendez-vous accepté',
          'start' => $appointment->date, 
          'backgroundColor' => 'green', // Couleur de fond pour les rendez-vous acceptés
          'borderColor' => 'green', // Couleur de la bordure
      ];
    }
    return view('doctor.calendar', compact('events'));
  }

  public function create(Request $request)
  {  
    $insertArr = [ 'title' => $request->title,
                    'start' => $request->start,
                    'end' => $request->end
                ];
    $event = Event::insert($insertArr);   
    return Response::json($event);
  }

  public function update(Request $request)
  {   
    $where = array('id' => $request->id);
    $updateArr = ['title' => $request->title,'start' => $request->start, 'end' => $request->end];
    $event  = Event::where($where)->update($updateArr);

    return Response::json($event);
  } 

  public function destroy(Request $request)
  {
    $event = Event::where('id',$request->id)->delete();

    return Response::json($event);
  } 


}
