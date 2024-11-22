@extends('layouts.admin')
@section('title')
Ajouter Consultation
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
                    <h1 >Ajouter Consultation</h1>
                </div><br>
                <div class="card-body"> 
                    <form method="POST" action="{{ route('ajouter-consultation') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="patient_id" id="patient_id" value="{{$patientDetails->id}}" hidden>
                        <div class="row mb-3">
                            <label for="nom" class="col-sm-2 col-form-label">Nom et prénom</label>
                            <div class="col-sm-8">
                              <p type="text" id="nom" name="nom" class="form-control">{{$patientDetails->nom}} {{$patientDetails->prenom}}</p>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="nom" class="col-sm-2 col-form-label">Téléphonne</label>
                            <div class="col-sm-8">
                              <p type="text" id="nom" name="nom" class="form-control">{{$patientDetails->telephone}}</p>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="nom" class="col-sm-2 col-form-label">Adresse</label>
                            <div class="col-sm-8">
                              <p type="text" id="nom" name="nom" class="form-control">{{$patientDetails->adresse}}</p>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="nom" class="col-sm-2 col-form-label">Date consultation</label>
                            <div class="col-sm-8">
                                <input type="date" id="date" name="date" class="form-control" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Description et Analyse demandé</label>
                            <div class="col-sm-8">
                              <textarea class="form-control" name="description" id="description" style="height: 100px"></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <legend class="col-form-label col-sm-2 pt-0">Cas urgent</legend>
                            <div class="col-sm-10">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="cas_urgent" id="casUrgentNon" value="non" checked>
                                    <label class="form-check-label" for="casUrgentNon">
                                        Non
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="cas_urgent" id="casUrgentOui" value="oui">
                                    <label class="form-check-label" for="casUrgentOui">
                                        Oui
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="prescription" class="col-sm-2 col-form-label">Prescription</label>
                            <div class="col-sm-8">
                                <input type="file" id="prescription" name="prescription" class="form-control">
                            </div>
                        </div>
                        <div class="text-center">
                            <div class="col-sm-12">
                              <button type="reset"  class="btn btn-secondary"> Reset </button>
                              <button type="submit" class="btn btn-primary">Ajouter</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection