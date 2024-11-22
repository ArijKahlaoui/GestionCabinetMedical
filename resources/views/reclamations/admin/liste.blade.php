@extends('layouts.admin')
@section('title')
Liste des Réclamations
@endsection
@section('content')
<main id="main" class="main">
    <section class="section">
        <div class="row">
        <div class="col-lg-12">
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
                <div class="card-body">
                    <h5 class="card-title">Liste des Patients</h5>
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th scope="col">Subject </th>
                                <th scope="col">Message</th>
                                <th scope="col">Décision</th>
                                <th scope="col">Opérations</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reclamations as $reclamation)
                            <tr>
                                <td scope="row"> {{$reclamation->Subject}}</td>
                                <td scope="row"> {{$reclamation->message}}</td>
                                @if (!empty($reclamation->decision))
                                <td scope="row"> {{$reclamation->decision}}</td>
                                @else
                                <td scope="row">Aucune décision prise</td>
                                @endif
                                <td scope="row">
                                    <button type="button"  class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalDialogScrollable">
                                        Répondre
                                    </button>
                                    <div class="modal fade" id="modalDialogScrollable" tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <form action="{{ route('reclamations.repondre') }}" method="POST">
                                                    @csrf
                                                    <div class="modal-body">
                                                        Votre Décision
                                                        <hr>
                                                        <input type="text" name="reclamation_id" id="reclamationIdInput" value="{{$reclamation->id}}" hidden>
                                                        <textarea name="decision" id="decision" class="form-control w-100"></textarea>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-success">Envoyer</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>                                    
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