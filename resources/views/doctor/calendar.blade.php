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
    <aside id="sidebar" class="sidebar">    
        <ul class="sidebar-nav" id="sidebar-nav">
    
          
          @foreach(auth()-> user()->roles as $role)
          @if($role->nom === 'admin')
            <li class="nav-item">
              <a class="nav-link collapsed" id="accueil" href="{{url('/dashboard')}}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link collapsed" id="profile" href="{{url('/profile')}}">
                <i class="bi bi-person"></i>
                <span>Profile</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link collapsed" href="{{url('/users')}}">
                <i class="bi bi-menu-button-wide"></i><span>liste utilisateurs</span></i>
              </a>
            </li>
          @endif
          @endforeach
    
          @foreach(auth()-> user()->roles as $role)
          @if($role->nom === 'medecin')
          <li class="nav-item">
            <a class="nav-link collapsed" id="profile" href="{{url('/profile')}}">
              <i class="bi bi-person"></i>
              <span>Profile</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link collapsed" id="profile" href="{{url('/patients')}}">
              <i class="bi bi-list-check"></i>
              <span>Liste des patients</span>
            </a>
          </li> 
          <li class="nav-item">
            <a class="nav-link collapsed" id="profile" href="{{url('/calendar')}}">
              <i class="bi bi-calendar-event"></i>
              <span>Calendrier</span>
            </a>
          </li> 
          <li class="nav-item">
            <a class="nav-link collapsed" id="profile" href="{{url('/appointment')}}">
              <i class="bi bi-folder"></i>
              <span>Rendez-vous</span>
            </a>
          </li> 
          @endif
          @endforeach
    
          @foreach(auth()-> user()->roles as $role)
          @if($role->nom === 'patient')
    
          <li class="nav-item">
            <a class="nav-link collapsed" id="accueil" href="{{url('/')}}">
              <i class="bi bi-grid"></i>
              <span>Accueil</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link collapsed" id="profile" href="{{url('/profile')}}">
              <i class="bi bi-person"></i>
              <span>Profile</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link collapsed" id="profile" href="{{url('/doctors')}}">
              <i class="bi bi-calendar-event"></i>
              <span>Liste des Medecins</span>
            </a>
          </li> 
          <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse">
              <i class="bi bi-calendar-week"></i><span>Rendez-vous</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
              <li>
                <a href="{{url('/appointments')}}">
                  <i class="bi bi-circle"></i><span>liste des rendez-vous</span>
                </a>
              </li>
              <li>
                <a href="{{url('/appointmentform')}}">
                  <i class="bi bi-circle"></i><span>nouveaux rendez-vous</span>
                </a>
              </li>
            </ul>
          </li>
          @endif
          @endforeach
    
        </ul>
    
    </aside>

    <main id="main" class="main">
        <section class="section">
            <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Calendrier des Rendez-vous</h5>
                        <div class="container">
                            <div class="response"></div>
                            <div id='calendar'></div>  
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </section>
    </main>
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
<script>
    $(document).ready(function () {
           
          var SITEURL = "{{url('/')}}";
          $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });
          var calendar = $('#calendar').fullCalendar({
              editable: true,
              events: SITEURL + "fullcalendar",
              displayEventTime: true,
              editable: true,
              eventRender: function (event, element, view) {
                  if (event.allDay === 'true') {
                      event.allDay = true;
                  } else {
                      event.allDay = false;
                  }
              },
              selectable: true,
              selectHelper: true,

              
              
               
            eventDrop: function (event, delta) {
                          var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                          var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                          $.ajax({
                              url: SITEURL + 'fullcalendar/update',
                              data: 'title=' + event.title + '&start=' + start + '&end=' + end + '&id=' + event.id,
                              type: "POST",
                              success: function (response) {
                                  displayMessage("Updated Successfully");
                              }
                          });
                      },
              eventClick: function (event) {
                  var deleteMsg = confirm("Do you really want to delete?");
                  if (deleteMsg) {
                      $.ajax({
                          type: "POST",
                          url: SITEURL + 'fullcalendar/delete',
                          data: "&id=" + event.id,
                          success: function (response) {
                              if(parseInt(response) > 0) {
                                  $('#calendar').fullCalendar('removeEvents', event.id);
                                  displayMessage("Deleted Successfully");
                              }
                          }
                      });
                  }
              }
   
          });
    });
   
    function displayMessage(message) {
      $(".response").html("<div class='success'>"+message+"</div>");
      setInterval(function() { $(".success").fadeOut(); }, 1000);
    }
</script>
</html>