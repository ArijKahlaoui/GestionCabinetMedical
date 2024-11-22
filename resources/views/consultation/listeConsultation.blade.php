@extends('layouts.admin')
@section('title')
Les Consultations
@endsection
@section('content')
<main id="main" class="main">
    <section class="section" style="left: 19% ;">
        <div class="row">
            <div class="card">
                <br>
                <div class="pagetitle" >
                    <h1 >Les Consultations de {{ $patient->nom}} {{ $patient->prenom}}</h1>
                </div>
                @if (count($consultations) > 0)
                @foreach ($consultations as $consultation)
                <div class="row mb-3">
                    <label for="nom" class="col-sm-2 col-form-label">Date</label>
                    <div class="col-sm-8">
                      <p type="text" id="nom" name="nom" class="form-control">{{$consultation->date}}</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="nom" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-8">
                      <p type="text" id="nom" name="nom" class="form-control">{{$consultation->description}}</p>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="nom" class="col-sm-2 col-form-label">Cas urgent</label>
                    <div class="col-sm-8">
                        <div class="form-check">
                            <label class="form-check-label" for="casUrgentNon">
                                {{ $consultation->cas_urgent}}
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="prescription" class="col-sm-2 col-form-label">Prescription</label>
                    <div class="col-sm-8">
                        @if ($consultation->prescription)
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#prescriptionModal{{ $consultation->id }}">
                                Voir la prescription
                            </button>
                            <div class="modal fade" id="prescriptionModal{{ $consultation->id }}" tabindex="-1" aria-labelledby="prescriptionModalLabel{{ $consultation->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="prescriptionModalLabel{{ $consultation->id }}">Prescription</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <iframe src="{{ asset($consultation->prescription) }}" style="width: 100%; height: 500px;"></iframe>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            Aucune prescription disponible
                        @endif
                    </div>
                </div>
                <hr>
                @endforeach
                @else
                <p>Aucune consultation disponible pour le moment.</p>
                @endif
            </div>
        </div>
    </section>
</main>
@endsection