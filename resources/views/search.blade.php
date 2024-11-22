@extends('layouts.admin')
@section('title')
Résultat de recheche
@endsection
@section('content')
<main id="main" class="main">
  <section class="section">
      <div class="row">
          <div class="col-lg-12">
              <div class="card">
                  <div class="card-body">
                      <h5 class="card-title">Résultats</h5>
                      @if(count($searched_item) != 0)
                      <section class="section dashboard">
                          <div class="row">
                              @foreach ( $searched_item as $doctor )
                              <div class="col-xxl-4 col-md-6">
                                  <div class="card info-card sales-card">
                                  <div class="card-body">
                                      <button class="btn btn-primary" type="button" disabled="">
                                        @foreach($doctor->roles as $role)
                                          @if($role->nom === "medecin")
                                            Medecin   
                                          @else
                                              Patient
                                          @endif
                                          @endforeach
                                      </button> 
                                      <div class="d-flex align-items-center">
                                          <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                              <img src="{{asset('dash/img/medecin.png')}}" alt="" style="width: 60px;">
                                          </div>
                                          <div class="ps-3">
                                              <h6>{{$doctor->nom}} {{$doctor->prenom}}</h6>
                                              <h5 class="card-title">{{$doctor->specialite}}</h5>
                                              <h5 class="card-title">{{$doctor->email}}</h5>
                                              <h5 class="card-title">{{$doctor->telephone}}</h5>
                                          </div>

                                      </div>
                                      <div class="d-flex">
                                        <div class="ms-auto">
                                            <a href="{{ route('discussion', ['destinataireId' => $doctor->id]) }}"> Voir la discussion</a>
                                        </div>                       
                                    </div> 
                                  </div>                           
                                  </div>
                              </div>          
                          @endforeach
                          </div>
                      </section>
                      @else
                        <strong>Aucun resultat trouvé pour votre recherche "{{$query}}"</strong>
                      @endif
                  </div>
              </div>
          </div>
      </div>
  </section>
</main>  
@endsection 

                                