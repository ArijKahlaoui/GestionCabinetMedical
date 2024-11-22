@extends('layouts.admin')
@section('title')
Liste Rendez-vous
@endsection
@section('content')
<main id="main" class="main">
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Liste des Medecins</h5>
                        <section class="section dashboard">
                            <div class="row">
                                @foreach($doctors as $doctor)
                                <div class="col-xxl-4 col-md-6">
                                    <div class="card info-card sales-card">
                                    <div class="card-body">
                                        <button class="btn btn-primary" type="button" disabled="">
                                            {{$doctor->specialite}}
                                        </button> 
                                        <div class="d-flex align-items-center">
                                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                <img src="{{asset('dash/img/medecin.png')}}" alt="" style="width: 60px;">
                                            </div>
                                            <div class="ps-3">
                                                <h6>{{$doctor->nom}} {{$doctor->prenom}}</h6>
                                                <h5 class="card-title">{{$doctor->email}}</h5>
                                                <h5 class="card-title">{{$doctor->telephone}}</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <div class="left">
                                            <a href="{{ route('discussion', ['destinataireId' => $doctor->id]) }}">
                                                <i class="bi bi-envelope"></i>
                                                Voir la discussion
                                            </a>
                                        </div>
                                        <div class=" ms-auto text-center">
                                            <a href="{{ route('consultations.liste-consultation.medecin', ['patientId'=>auth()-> user()->id,'medecinId' => $doctor->id]) }}">
                                                <i class="bi bi-file-earmark-ruled"></i>
                                                Mes Consultations
                                            </a>
                                        </div>
                                        <div class="ms-auto">
                                            <a  href="{{ route('calendar', ['id' => $doctor->id]) }}" class="btn btn-link"><i class="bi bi-calendar-event"></i>Calendrier</a>
                                        </div>                               
                                    </div>                                
                                    </div>
                                </div>          
                                @endforeach
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection