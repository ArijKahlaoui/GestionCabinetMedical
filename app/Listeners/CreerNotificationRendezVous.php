<?php

namespace App\Listeners;

use App\Events\RendezVousAjoute;
use App\Notifications\DateChangeNotification;
use App\Notifications\NouveauRendezVousNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreerNotificationRendezVous implements ShouldQueue
{

    use InteractsWithQueue;

    

    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(RendezVousAjoute $event)
    {
        $rendezVous = $event->rendezVous;
        $medecin = $rendezVous->medecin_id;

        $medecin->notify(new DateChangeNotification($rendezVous));
    }
}
