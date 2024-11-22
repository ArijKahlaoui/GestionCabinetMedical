@extends('layouts.admin')
@section('title')
Liste Rendez-vous
@endsection
@section('content')
<main id="main" class="main">
    <section class="section">
        <div class="row">
            <div class="pagetitle">
                <h1>Liste des Rendez-vous</h1>
            </div>
                <div class="card">
                    <h5 class="card-title">Nombre totale des demandes de rendez-vous : <span>{{ $nombreRendezVous }}</span></h5>
                    <section class="section dashboard">
                        <div class="row">
                        @foreach ($data as $appoint )
                            <div class="col-xxl-4 col-md-6">
                                <div class="card info-card sales-card">
                                <div class="card-body">
                                    @if($appoint->etat === "Refusé")
                                        <button class="btn btn-danger" type="button" disabled="">
                                            <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                                            {{$appoint->etat}}
                                        </button>  
                                    @elseif($appoint->etat === "Accepté")
                                        <button class="btn btn-success" type="button" disabled="">
                                            <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                                            {{$appoint->etat}}
                                        </button> 
                                    @else
                                    <button class="btn btn-primary" type="button" disabled="">
                                        <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                                        {{$appoint->etat}}
                                    </button> 
                                    @endif
                                    <h5 class="card-title">
                                        Envoyé le {{$appoint->created_at->format('d/m/Y')}}
                                    </h5>
                
                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <img src="{{asset('dash/img/medecin.png')}}" alt="" style="width: 60px;">
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{$appoint->medecin->nom}} {{$appoint->medecin->prenom}}</h6>
                                            <span>{{$appoint->medecin->specialite}}</span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="d-flex">
                                    @unless($appoint->etat === "Accepté")
                                    <button type="button"  class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDialogScrollable">
                                       Supprimer
                                    </button>
                                    <div class="modal fade" id="modalDialogScrollable" tabindex="-1">
                                        <div class="modal-dialog">
                                          <div class="modal-content">
                                            <div class="modal-body">
                                                Êtes-vous sûr de vouloir supprimer ce rendez-vous ?
                                            </div>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                              <a type="button" class="btn btn-danger" href="{{ route('delete', $appoint->id) }}" >Supprimer</a>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                      @endif
                                      <div class="ms-auto">
                                        <a href="{{ route('detailAppointment', ['id' => $appoint->id]) }}" class="btn btn-link">plus d'information</a>
                                    </div>                                    
                                </div>                                
                                </div>
                            </div>          
                        @endforeach
                    </section>
                </div>
        </div>    
    </section>
</main>
@endsection