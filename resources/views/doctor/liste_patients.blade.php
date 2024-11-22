@extends('layouts.admin')
@section('title')
Liste des Patients
@endsection
@section('content')
<main id="main" class="main">
    <section class="section">
        <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Liste des Patients</h5>
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th scope="col">Nom </th>
                                <th scope="col">Email</th>
                                <th scope="col">Téléphone</th>
                                <th scope="col">Adresse</th>
                                <th scope="col">Consultation(s)</th>
                                <th scope="col">Discution</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($patients as $patient)
                            <tr>
                                <td scope="row"> {{$patient->nom}}</td>
                                <td scope="row"> {{$patient->email}}</td>
                                <td scope="row"> {{$patient->telephone}}</td>
                                <td scope="row"> {{$patient->adresse}}</td>
                                <td scope="row">
                                    <a type="button" href="{{ route('consultations.ajouter', ['patient' => $patient->id]) }}" class="btn btn-primary">Ajouter</a>
                                    <a type="button" href="{{ route('consultations.liste-consultation', ['patientId' => $patient->id]) }}" class="btn btn-warning">Details</a>
                                </td>
                                <td>
                                    <a href="{{ route('discussion', ['destinataireId' => $patient->id]) }}">Voir la discussion</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </div>
    </section>
</main>
@endsection