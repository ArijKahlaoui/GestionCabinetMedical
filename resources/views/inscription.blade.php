@extends('layout')
@section('title')
Inscription
@endsection

@section('content')
<section id="banner" class="banner" >
  
<div class="bg-color">
 
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <div class="col-md-12">
        <div class="navbar-header">
          <div class="collapse navbar-collapse navbar-right" id="myNavbar">
            <ul class="nav navbar-nav">
              <li ><a href="{{url('/')}}">Accueil</a></li>
            </ul>
          </div>
        </div>
        <div class="collapse navbar-collapse navbar-right" id="myNavbar">
          <ul class="nav navbar-nav">
            <li class=""><a href="{{url('login')}}">Login</a></li>
            <li class="active"><a href="{{url('inscrit')}}">Inscription</a></li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
    <div class="container">
        <div class="row">
          <div class="banner-info">
          <div class="container bg-white pb-5">
            <div class="row d-flex justify-content-start align-items-center mt-sm-5">
                <div class="col-lg-5 col-10">
                    <div id="circle"></div>
                    <div class="pb-5"> <img src="{{asset('assets/img/login.jpg')}}" alt="" style="border-radius: 10% ;width: 600px;"> </div>
                </div>
                <div class="col-lg-5 offset-lg-2 col-md-6 offset-md-3">
                    <div class="pt-4">
                        <h6><span style="font-size: 27px;font-family:'Lucida Sans';margin-left: 60px;color: rgba(28,74,90, 0.9);">Création de compte</span></h6>
                    </div>
                    <div class="mt-3 mt-md-5">
                      @if($errors->any())
                        <div class="text-danger text-center">
                          @foreach($errors->all() as $error)
                            <p> {{$error}}</p>
                          @endforeach
                        </div>
                      @endif

                      @if(session()->has('error'))
                        <p class="text-danger text-center"> {{session('error')}}</p>
                      @endif

                      @if(session()->has('success'))
                        <p class="text-success text-center"> {{session('success')}}</p>
                      @endif

                    <form class="pt-4" action="{{route('inscription.post')}}" method="POST">
                      @csrf
                      <div class="form-group row">
                        <div class="col-sm-12 mb-3">
                            <label for="roles">Choisissez votre rôle</label>
                            <select name="roles" id="role" class="form-control">
                              <option></option>
                                <option value="2">Medecin</option>
                                <option value="3">Patient</option>
                            </select>
                        </div>
                      </div>
                    <!-- Champs communs -->
                    <div class="form-group row">
                      <div class="col-sm-6 mb-3 mb-sm-0">
                          <label for="email">Nom</label>
                          <input type="text" name="nom" class="border-bottom border-primary" placeholder="Saisir votre nom">
                      </div>
                      <div class="col-sm-6">
                          <label for="email">Prénom</label>
                          <input type="text" name="prenom" class="border-bottom border-primary" placeholder="Saisir votre prénom">
                      </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="email">Téléphone</label>
                        <input type="number" name="telephone" class="border-bottom border-primary" placeholder="Saisir votre téléphone">
                    </div>
                    <div class="col-sm-6">
                        <label for="adresse">Adresse</label>
                        <input type="text" name="adresse" class="border-bottom border-primary" placeholder="Saisir votre adresse">
                    </div>
                  </div>
                  <div class="form-group row">
                      <div class="col-sm-6 mb-3 mb-sm-0">
                          <label for="email">Adresse Email</label>
                          <input type="email" name="email" class="border-bottom border-primary" placeholder="Saisir votre email ici">
                      </div>
                      <div class="col-sm-6">
                          <label for="password">Mot de passe</label>
                          <input type="password" name="password" class="border-bottom border-primary" onpaste="return false;" placeholder="Saisir votre mot de passe ici">
                      </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="genre">Genre</label>
                        <select name="genre" id="genre" class="form-control">
                            <option value="homme">Homme</option>
                            <option value="femme">Femme</option>
                        </select>
                    </div>
                    <!-- Champs spécifiques au médecin -->
                    <div class="col-sm-6">
                      <div class="medecin-fields" style="display: none;">
                        <label for="spec">Spécialité</label>
                        <input type="text" name="specialite" class="border-bottom border-primary" placeholder="Saisir votre spécialité">
                      </div>
                      <!-- Champs spécifiques au patient -->
                      <div class="patient-fields" style="display: none;">
                        <label for="email">Numéro de sécurité sociale</label>
                        <input type="text" name="secu_social" class="border-bottom border-primary" placeholder="Saisir votre numéro de sécurité sociale">
                      </div>
                  </div>
                </div>
                    
                <button  type="submit" class="btn btn-appoint btn-block mb-3">S'inscrire</button>
                </form>
                  <hr>
                  <div class="text-center">
                      <a class="small" href="{{url('/login')}}">Vous avez déja un compte ?? Login!</a>
                  </div>
                </div>
              </div>
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>
<footer id="footer">
  <div class="top-footer">
    <div class="container">
      <div class="row">
        <div class="col-md-4 col-sm-4 marb20">
          <div class="ftr-tle">
            <h4 class="white no-padding">About Us</h4>
          </div>
          <div class="info-sec">
            <p>Praesent convallis tortor et enim laoreet, vel consectetur purus latoque penatibus et dis parturient.</p>
          </div>
        </div>
        <div class="col-md-4 col-sm-4 marb20">
          <div class="ftr-tle">
            <h4 class="white no-padding">Quick Links</h4>
          </div>
          <div class="info-sec">
            <ul class="quick-info">
              <li><a href="index.html"><i class="fa fa-circle"></i>Home</a></li>
              <li><a href="#service"><i class="fa fa-circle"></i>Service</a></li>
              <li><a href="#contact"><i class="fa fa-circle"></i>Appointment</a></li>
            </ul>
          </div>
        </div>
        <div class="col-md-4 col-sm-4 marb20">
          <div class="ftr-tle">
            <h4 class="white no-padding">Follow us</h4>
          </div>
          <div class="info-sec">
            <ul class="social-icon">
              <li class="bglight-blue"><i class="fa fa-facebook"></i></li>
              <li class="bgred"><i class="fa fa-google-plus"></i></li>
              <li class="bgdark-blue"><i class="fa fa-linkedin"></i></li>
              <li class="bglight-blue"><i class="fa fa-twitter"></i></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>


<script>
  document.addEventListener('DOMContentLoaded', function () {
      const roleSelect = document.getElementById('role');
      const medecinFields = document.querySelector('.medecin-fields');
      const patientFields = document.querySelector('.patient-fields');

      roleSelect.addEventListener('change', function () {
          // Masquer tous les champs spécifiques
          medecinFields.style.display = 'none';
          patientFields.style.display = 'none';

         
         
          // Afficher le champ "specialite" si le rôle choisi est "Medecin"
          if (roleSelect.value === '2') {
              medecinFields.style.display = 'block';
          }

          // Afficher le champ "secu_social" si le rôle choisi est "Patient"
          if (roleSelect.value === '3') {
              patientFields.style.display = 'block';
          }
      });
  });
</script>

@endsection