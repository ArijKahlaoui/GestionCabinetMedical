@extends('layout')
@section('title')
Login
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
                <li class="active"><a href="{{url('login')}}">Login</a></li>
                <li class=""><a href="{{url('inscrit')}}">Inscription</a></li>
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
                <div class="col-lg-4 offset-lg-2 col-md-6 offset-md-3">
                    <div class="pt-4">
                        <h6><span style="font-size: 38px;font-family:'Lucida Sans';margin-left: 60px;color: rgba(28,74,90, 0.9);">BIENVENUE</span></h6>
                    </div>
                    <div class="mt-3 mt-md-5">
                      <div class="mt-5">
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
                    </div>

                        <h5>Connectez-vous à votre compte</h5>
                        <form class="pt-4" action="{{route('login.post')}}" method="POST">
                            @csrf
                            <div class="d-flex flex-column pb-3"> 
                                <label for="email">Adresse Email</label> 
                                <input type="email" name="email"  class="border-bottom border-primary" placeholder="Saisir votre email ici"> 
                            </div>
                            <div class="d-flex flex-column pb-3"> 
                                <label for="password">Mot de passe</label> 
                                <input type="password" name="password" class="border-bottom border-primary" onpaste="return false;" placeholder="Saisir votre mot de passe ici"> 
                            </div>
                            <div class="d-flex jusity-content-end pb-4">
                                <div class="ml-auto"> 
                                    <a href="#" class="text-danger text-decoration-none">Mot de passe oublié?</a> 
                                </div>
                            </div> 
                            <input type="submit" value="Se connecter" class="btn btn-appoint btn-block mb-3"> 
                            <!-- <button class="btn btn-block bg-white border border-primary rounded "><span class="fa fa-facebook-official text-primary px-2"></span>Log In with Facebook</button>-->
                            <div class="register mt-5">
                                <p>Vous n'avez pas de compte? <a href="{{url('inscrit')}}">Créer un compte</a></p>
                            </div>
                        </form>
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


@endsection
