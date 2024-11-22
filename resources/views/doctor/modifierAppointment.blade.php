@extends('layouts.admin')
@section('title')
Modifier Rendez-vous
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
                            <h5 class="card-title">Modifier Rendez-vous</h5>
                            <form method="POST" action="{{ route('rendezvous.update', ['rendezvous' => $rendezvous->id]) }}">
                                @csrf
                                @method('PUT')
                        
                                <!-- Ajoutez les champs du formulaire ici -->
                                <div class="form-group">
                                    <label for="date">Date</label>
                                    <input type="date" name="date" class="form-control" value="{{ $rendezvous->date }}">
                                </div>
                                <!-- Autres champs du formulaire -->
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection