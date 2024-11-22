@extends('layouts.admin')
@section('title')
Envoyer Message
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
                        <div class="pagetitle" >
                            <h1 > Envoyer Message</h1>
                        </div>
                        <form method="POST" action="{{ route('envoyer.message') }}" class="text-center">
                            @csrf
                            <input type="text" id="destinataire" name="destinataire" value="{{$medecin->id}}" class="form-control" hidden>
                            <div class="row mb-3">
                                <label for="nom" class="col-sm-4 col-form-label">À</label>
                                <div class="col-sm-5">
                                  <p class="form-control">{{$medecin->email}}</p>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="nom" class="col-sm-4 col-form-label">Objet</label>
                                <div class="col-sm-5">
                                  <input type="text" id="Subject" name="Subject" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPassword" class="col-sm-4 col-form-label">Message</label>
                                <div class="col-sm-5">
                                  <textarea class="form-control" id="message" name="message" rows="4"></textarea>
                                </div>
                            </div>
                            <!-- Ajoutez d'autres champs du formulaire ici -->
                            <button type="submit" class="btn btn-primary">Envoyer Message</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection