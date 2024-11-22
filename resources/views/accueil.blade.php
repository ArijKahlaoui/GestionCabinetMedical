<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Medilab Free Bootstrap HTML5 Template</title>
  <meta name="description" content="Free Bootstrap Theme by BootstrapMade.com">
  <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">

  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans|Raleway|Candal">
  <link rel="stylesheet" type="text/css" href="{{asset('accueil/css/font-awesome.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('accueil/css/bootstrap.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('accueil/css/style.css')}}">

</head>

<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
  <!--banner-->
  <section id="banner" class="banner">
    <div class="bg-color">
      <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
          <div class="col-md-12">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				      </button>
              <a class="navbar-brand" href="#"></a>
            </div>
            <div class="collapse navbar-collapse navbar-right" id="myNavbar">
              <ul class="nav navbar-nav">
                <li class="active"><a href="#banner">Accueil</a></li>
                <li class=""><a href="#service">Services</a></li>
                <li class=""><a href="#about">A propos</a></li>
                <li class=""><a href="#contact">Contact</a></li>
                @auth
                <li class=""><a href="{{url('profile')}}">Profile</a></li>
                @endauth
                @guest
                <li class=""><a href="{{url('login')}}">Login</a></li>
                <li class="active"><a href="{{url('inscrit')}}">Inscription</a></li>
                @endguest
              </ul>
            </div>
          </div>
        </div>
      </nav>
      <div class="container">
        <div class="row">
          <div class="banner-info">
            <div class="banner-logo text-center">
              <!--<img src="{{asset('accueil/img/logo.png')}}" class="img-responsive">-->
            </div>
            <div class="banner-text text-center">
              <h1 class="white">Inscrivez-vous dès aujourd'hui et prenez le contrôle de votre bien-être !</h1>              
            </div>
            <div class="overlay-detail text-center">
              <a href="#service"><i class="fa fa-angle-down"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/ banner-->
  <!--service-->
  <section id="service" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-4 col-sm-4">
          <h2 class="ser-title">SERVICES</h2>
          <hr class="botm-line">
          <p>Medilap vous offre une solution complète pour gérer votre santé de manière efficace. Nos services sont conçus pour vous simplifier la vie.</p>
        </div>
        <div class="col-md-4 col-sm-4">
          <div class="service-info">
            <div class="icon">
              <i class="fa fa-stethoscope"></i>
            </div>
            <div class="icon-info">
              <h4>Gestion Complète des Rendez-vous Médicaux </h4>
            </div>
          </div>
          <div class="service-info">
            <div class="icon">
              <i class="fa fa-ambulance"></i>
            </div>
            <div class="icon-info">
              <h4>Suivi des Patients</h4>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-sm-4">
          <div class="service-info">
            <div class="icon">
              <i class="fa fa-user-md"></i>
            </div>
            <div class="icon-info">
              <h4>Informations complètes sur les médecins</h4>
            </div>
          </div>
          <div class="service-info">
            <div class="icon">
              <i class="fa fa-medkit"></i>
            </div>
            <div class="icon-info">
              <h4>Suivi des Traitements et Médicaments</h4>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/ service-->
  
  <!--about-->
  <section id="about" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-3 col-sm-4 col-xs-12">
          <div class="section-title">
            <h2 class="head-title lg-line">Votre Santé, Notre Priorité</h2>
            <hr class="botm-line">
            <p class="sec-para">Medilap est dédié à rendre votre gestion médicale plus facile. Notre mission est de vous aider à prendre le contrôle de votre bien-être en vous fournissant des informations précieuses et des outils pratiques.</p>
            <a href="" style="color: #0cb8b6; padding-top:10px;">Plus ...</a>
          </div>
        </div>
        <div class="col-md-9 col-sm-8 col-xs-12">
          <div style="visibility: visible;" class="col-sm-9 more-features-box">
            <div class="more-features-box-text">
              <div class="more-features-box-text-icon"> <i class="fa fa-angle-right" aria-hidden="true"></i> </div>
              <div class="more-features-box-text-description">
                <h3>Restez Informé pour une Meilleure Santé</h3>
                <p>Chez Medilap, nous croyons que l'information est la clé d'une vie plus saine. Découvrez nos articles et conseils pour prendre en charge votre bien-être.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/ about-->
  
  
  <!--cta 2-->
  <section id="cta-2" class="section-padding">
    <div class="container">
      <div class=" row">
        <div class="col-md-2"></div>
      </div>
    </div>
  </section>
  <!--cta-->
  <!--contact-->
  <section id="contact" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2 class="ser-title">CONTACTEZ-NOUS</h2>
          <hr class="botm-line">
        </div>
        <div class="col-md-4 col-sm-4">
          <h3>Coordonnées</h3>
          <div class="space"></div>
          <p><i class="fa fa-map-marker fa-fw pull-left fa-2x"></i>321 Awesome Street<br> New York, NY 17022</p>
          <div class="space"></div>
          <p><i class="fa fa-envelope-o fa-fw pull-left fa-2x"></i>info@companyname.com</p>
          <div class="space"></div>
          <p><i class="fa fa-phone fa-fw pull-left fa-2x"></i>+1 800 123 1234</p>
        </div>
        <div class="col-md-8 col-sm-8 marb20">
          <div class="contact-info">
            <h3 class="cnt-ttl">Avez-vous des questions ou souhaitez-vous prendre rendez-vous ? Contactez-nous dès maintenant.</h3>
            <div class="space"></div>
            <div id="sendmessage">Your message has been sent. Thank you!</div>
            <div id="errormessage"></div>
            <form action="" method="post" role="form" class="contactForm">
              <div class="form-group">
                <input type="text" name="name" class="form-control br-radius-zero" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <input type="email" class="form-control br-radius-zero" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control br-radius-zero" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <textarea class="form-control br-radius-zero" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                <div class="validation"></div>
              </div>

              <div class="form-action">
                <button type="submit" class="btn btn-form">Send Message</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/ contact-->
  <!--footer-->
  <footer id="footer">
    <div class="footer-line">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            © Copyright Medilab Theme. All Rights Reserved
            <div class="credits">
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!--/ footer-->

  <script src="{{asset('accueil/js/jquery.min.js')}}"></script>
  <script src="{{asset('accueil/js/jquery.easing.min.js')}}"></script>
  <script src="{{asset('accueil/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('accueil/js/custom.js')}}"></script>

</body>

</html>
