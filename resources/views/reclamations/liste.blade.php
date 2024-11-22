@extends('layouts.admin')
@section('title')
Liste des Reclamations
@endsection
@section('content')
<main id="main" class="main">
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Mes Réclamations</h5>
                        <section class="section dashboard">
                            <div class="row">
                                @if ($reclamations->isEmpty())
                                    <p>Aucune réclamation n'a été trouvée pour ce médecin.</p>
                                @else
                                @foreach ($reclamations as $reclamation)
                                <div class="col-xl-6 col-md-6">
                                    <div class="card info-card sales-card">
                                    <div class="card-body">
                                        <div class="row mb-3">
                                            <label for="inputText" class="col-sm-4 col-form-label">Objet :</label>
                                            <div class="col-sm-8">
                                               <p class="col-form-label">{{ $reclamation->Subject }}</p> 
                                            </div>
                                        </div>
                                        <hr/>
                                        <div class="row mb-3">
                                            <label for="inputText" class="col-sm-4 col-form-label">Message :</label>
                                            <div class="col-sm-8">
                                                <p class="col-form-label">{{ $reclamation->message }}</p> 
                                            </div>
                                        </div>
                                        
                                        @if (!empty($reclamation->decision))
                                        <hr/>
                                        <div class="row mb-3">
                                            <label for="inputText" class="col-sm-4 col-form-label">Décision Admin :</label>
                                            <div class="col-sm-8">
                                                <p class="col-form-label">{{ $reclamation->decision }}</p> 
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                    <div class="d-flex">
                                    </div>                                
                                    </div>
                                </div>          
                            @endforeach
                            @endif
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection