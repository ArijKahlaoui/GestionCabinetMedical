<?php
$start = $_GET['start'] ?? null;
$end = $_GET['end'] ?? null;
$doctorId = $_GET['id'] ?? null;
?>

@extends('layouts.admin')
@section('title')
Ajouter Rendez-vous
@endsection
@section('content')
<main id="main" class="main">
    
    <section class="section" style="left: 19% ;">
        <div class="row">
            <div class="card">
                <br>
                @if(session()->has('message'))

                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>{{session()->get('message')}}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                <div class="pagetitle" >
                    <h1 >Demander rendez-vous</h1>
                </div><br>
                <div class="card-body"> 
                  <form method="POST" action="{{ route('ajouter-appointment') }}">
                    @csrf
                    <div class="row mb-3">
                      <label for="nom" class="col-sm-2 col-form-label">Nom</label>
                      <div class="col-sm-10">
                        <input type="text" id="nom" name="nom" value="{{$user->nom}}" class="form-control">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="email" class="col-sm-2 col-form-label">Adresse email</label>
                      <div class="col-sm-10">
                        <input type="email" id="email" name="email" value="{{$user->email}}" class="form-control">
                      </div>
                    </div>
                    <div class="row mb-3">
                        <label for="email" class="col-sm-2 col-form-label">Téléphone</label>
                        <div class="col-sm-10">
                          <input type="number" id="telephone" name="telephone" value="{{$user->telephone}}" class="form-control">
                        </div>
                    </div> 
                    @if ($start && $end)
                    <div class="row mb-3">
                      <label for="email" class="col-sm-2 col-form-label">Date du rendez-vous</label>
                      <div class="col-sm-10">
                        <input type="text" id="date" name="date" class="form-control" value="{{ date('Y-m-d', strtotime($start)) }}">
                      </div>
                    </div>
                    @endif
                    @if($doctorId)
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Médecin</label>
                        <div class="col-sm-10">
                          <select class="form-select" name="medecin_id" aria-label="Default select example">
                            @foreach($medecins as $medecin)
                            @if($medecin->id == $doctorId)
                              <option value="{{ $medecin->id }}">{{ $medecin->nom }} {{ $medecin->prenom }} | <span>| {{$medecin->specialite}}</span></option>
                            @endif
                            @endforeach
                          </select>
                        </div>
                    </div>
                    @else
                    <div class="row mb-3">
                      <label class="col-sm-2 col-form-label">Médecin</label>
                      <div class="col-sm-10">
                        <select class="form-select" name="medecin_id" aria-label="Default select example">
                          @foreach($medecins as $medecin)
                          
                            <option value="{{ $medecin->id }}">{{ $medecin->nom }} {{ $medecin->prenom }} | <span>| {{$medecin->specialite}}</span></option>
                         
                          @endforeach
                        </select>
                      </div>
                    </div>
                    @endif
                    <div class="row mb-3">
                      <label for="symptomes" class="col-sm-2 col-form-label">Symptômes</label>
                      <div class="col-sm-10">
                          <select class="form-select" id="symptomes" name="symptomes[]" multiple>
                              @foreach($symptomes as $symptome)
                                  <option value="{{ $symptome }}">{{ $symptome }}</option>
                              @endforeach
                          </select>
                      </div>
                  </div>                                        
                    <div class="row mb-3">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Message</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" id="message" name="message" rows="4"></textarea>
                        </div>
                    </div>
                    <div class="text-center">
                      <div class="col-sm-12">
                        <button type="reset"  class="btn btn-secondary"> Reset </button>
                        <button type="submit" class="btn btn-primary">Envoyer</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
        </div>
    </section>

</main>

@endsection