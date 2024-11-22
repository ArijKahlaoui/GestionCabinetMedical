<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>@yield('title','Gestion Medicale')</title>

    <!-- Favicons -->
  <link href="{{asset('accueil/img/logo.png')}}" rel="icon">
  <link href="{{asset('accueil/img/logo.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans|Raleway|Candal">

  <!-- Vendor CSS Files -->
  <link href="{{asset('dash/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('dash/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('dash/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('dash/vendor/quill/quill.snow.css')}}" rel="stylesheet">
  <link href="{{asset('dash/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
  <link href="{{asset('dash/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('dash/vendor/simple-datatables/style.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('dash/css/style.css')}}" rel="stylesheet">
  

</head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
 
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
 
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" />
 
<script src="https://cdn.jsdelivr.net/npm/moment@2.27.0/moment.min.js"></script>
 
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.js"></script>
<body>
    @include('include.header')
    @include('include.sidebar')
    @yield('content')

    <!-- Vendor JS Files -->
    <script src="{{asset('dash/vendor/apexcharts/apexcharts.min.js')}}"></script>
    <script src="{{asset('dash/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('dash/vendor/chart.js/chart.min.js')}}"></script>
    <script src="{{asset('dash/vendor/echarts/echarts.min.js')}}"></script>
    <script src="{{asset('dash/vendor/quill/quill.min.js')}}"></script>
    <script src="{{asset('dash/vendor/simple-datatables/simple-datatables.js')}}"></script>
    <script src="{{asset('dash/vendor/tinymce/tinymce.min.js')}}"></script>
    <script src="{{asset('dash/vendor/php-email-form/validate.js')}}"></script>
    <!-- Template Main JS File -->
    <script src="{{asset('dash/js/main.js')}}">  </script>
    
</body>
</html>