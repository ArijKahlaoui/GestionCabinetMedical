<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="{{asset('assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link  href="{{asset('assets/css/sb-admin-2.min.css')}}" rel="stylesheet">
    <link  href="{{asset('assets/css/login.css')}}" rel="stylesheet">
    <link  href="{{asset('assets/css/styles.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans|Raleway|Candal">
    
    <link rel="stylesheet" type="text/css" href="{{asset('accueil/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('accueil/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('accueil/css/style.css')}}">

    <title>@yield('title','Gestion Medicale')</title>
  </head>
  <body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
    @yield('content')

    

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('accueil/js/jquery.min.js')}}"></script>
    <script src="{{asset('accueil/js/jquery.easing.min.js')}}"></script>
    <script src="{{asset('accueil/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('accueil/js/custom.js')}}"></script>
    <script  href="{{asset('assets/js/sb-admin-2.min.js')}}" ></script>
    <script>
        $('ul li').on('click', function() {
        $('li').removeClass('active');
        $(this).addClass('active');
      });
    </script>
    
  </body>
</html>