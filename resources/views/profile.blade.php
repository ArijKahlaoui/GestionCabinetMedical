@extends('layouts.patientlayout')
@section('title')
Profile
@endsection

@section('content')


<main id="main" class="main">

    <div class="pagetitle">
      <h1>Profile</h1>
    </div>

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="{{asset('dash/img/patient.jpg')}}" width="200px" height="100px" alt="Profile" class="rounded-circle">
              <h2>{{auth()-> user()-> nom}} {{auth()-> user()-> prenom}}</h2>
              <br>
              <button class="btn btn-primary" type="button" disabled="">
                <h3>
                  
                </h3>
                @foreach(auth()-> user()->roles as $role)
                  {{ $role->nom }}<br>
                  @endforeach
              </button>
              <br>
              <div class="social-links mt-2">
                <a class="twitter"><i class="bi bi-twitter"></i></a>
                <a class="facebook"><i class="bi bi-facebook"></i></a>
                <a class="instagram"><i class="bi bi-instagram"></i></a>
                <a class="linkedin"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Détails</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">modifier Profile</button>
                </li>

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <h5 class="card-title">Profile Details</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Nom</div>
                    <div class="col-lg-9 col-md-8">{{auth()-> user()-> nom}} </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Prenom</div>
                    <div class="col-lg-9 col-md-8">{{auth()-> user()-> prenom}}</div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Adress</div>
                    <div class="col-lg-9 col-md-8">{{auth()-> user()->adresse}}</div>
                  </div>
                  @foreach(auth()-> user()->roles as $role)
                  @if($role->nom === 'medecin')
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Spécialité</div>
                    <div class="col-lg-9 col-md-8">{{auth()-> user()->specialite}}</div>
                  </div>
                  @endif
                  @if($role->nom === 'patient')
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Numéro de sécurité sociale</div>
                    <div class="col-lg-9 col-md-8">{{auth()-> user()->secu_social}}</div>
                  </div>
                  @endif
                  @endforeach
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Téléphone</div>
                    <div class="col-lg-9 col-md-8">{{auth()-> user()-> telephone}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8">{{auth()-> user()-> email}}</div>
                  </div>

                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
                  <form action="{{route('users.update', auth()-> user()->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                      <label for="nom" class="col-md-4 col-lg-3 col-form-label">Nom</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="nom" type="text" class="form-control" id="nom" value="{{auth()-> user()-> nom}}">
                      </div>
                    </div>
                    
                    <div class="row mb-3">
                      <label for="prenom" class="col-md-4 col-lg-3 col-form-label">Prénom</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="prenom" type="text" class="form-control" id="prenom" value="{{auth()-> user()-> prenom}}">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="Address" class="col-md-4 col-lg-3 col-form-label">Adress</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="adresse" type="text" class="form-control" id="adresse" value="{{auth()-> user()-> adresse}}">
                      </div>
                    </div>
                    <div class="row mb-3">
                      <label for="telephone" class="col-md-4 col-lg-3 col-form-label">Télépone</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="telephone" type="text" class="form-control" id="telephone" value="{{auth()-> user()-> telephone}}">
                      </div>
                    </div>
                    @foreach(auth()-> user()->roles as $role)
                    @if($role->nom === 'medecin')
                    <div class="row mb-3">
                      <label for="specialite" class="col-md-4 col-lg-3 col-form-label">Spécialité</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="specialite" type="text" class="form-control" id="specialite" value="{{auth()-> user()-> specialite}}">
                      </div>
                    </div>
                    @endif
                   
                    @if($role->nom === 'patient')
                    <div class="row mb-3">
                      <label for="secu_social" class="col-md-4 col-lg-3 col-form-label">Numéro de sécurité sociale</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="secu_social" type="text" class="form-control" id="secu_social" value="{{auth()-> user()-> secu_social}}">
                      </div>
                    </div>
                    @endif
                    @endforeach
                    
                    <div class="row mb-3">
                      <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email" type="email" class="form-control" id="Email" value="{{auth()-> user()-> email}}">
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </div>
                  </form><!-- End Profile Edit Form -->

                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main>

@endsection