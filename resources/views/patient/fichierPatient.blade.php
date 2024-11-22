@extends('layouts.admin')
@section('title')
Fichier du patient
@endsection
@section('content')
<main id="main" class="main">
    
    <section class="section profile">
        <div class="row">
            <div class="col-xl-6">

                <div class="card" style="left: 50%">
                  <div class="card-body pt-3">
                   
                    <div class="pagetitle" >
                        <h1 class="d-flex justify-content-center align-items-center">Fichier Patient </h1>
                    </div><hr>
                    <br>
                    <div class="card-body "> 
                      <form class="">
                        @csrf
                        <div class="row mb-3">
                          <label for="nom" class="col-sm-5 col-form-label">Nom</label>
                          <div class="col-sm-5">
                            <p>{{ $appoint->nom }}</p>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label for="email" class="col-sm-5 col-form-label">Adresse email</label>
                          <div class="col-sm-5">
                            <p>{{ $appoint->email }}</p>
                          </div>
                        </div>
                        <div class="row mb-3">
                            <label for="email" class="col-sm-5 col-form-label">Téléphone</label>
                            <div class="col-sm-5">
                                <p>{{ $appoint->telephone }}</p>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-5 col-form-label">Nom du médecin</label>
                            <div class="col-sm-5">
                              <p>{{ $appoint->medecin->nom }} {{ $appoint->medecin->prenom }}</p>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-5 col-form-label">Spécialité du médecin</label>
                            <div class="col-sm-5">
                              <p>{{ $appoint->medecin->specialite}}</p>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                          <label class="col-sm-5 col-form-label">Les symptomes</label>
                          <div class="col-sm-5">
                            @if ($appoint->symptomes)
                            <ul>
                              @foreach(json_decode($appoint->symptomes) as $symptome)
                                  <li>{{ $symptome }}</li>
                              @endforeach
                            </ul>
                            @else
                              <p>Aucun symptôme pour ce rendez-vous.</p>
                            @endif
                          
                          </div>
                      </div>
                        <div class="row mb-3">
                            <label for="inputPassword" class="col-sm-5 col-form-label">Message</label>
                            <div class="col-sm-5">
                                <p>{{ $appoint->message }}</p>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputPassword" class="col-sm-5 col-form-label">Date de rendez-vous</label>
                            <div class="col-sm-5">
                                @if($appoint->date)
                                    <p>{{ $appoint->date }}</p>
                                @else
                                    <strong>Aucune date de rendez-vous spécifiée</strong>
                                @endif
                            </div>
                        </div>
                      </form>
                    </div>
      
                  </div>
                </div>
      
              </div>
        </div>
    </section>
</main>

@endsection