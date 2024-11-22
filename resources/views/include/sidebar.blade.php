<!-- ======= Sidebar ======= -->
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
        <li class="nav-item">
          <a class="nav-link collapsed" href="{{url('/reclamations/admin')}}">
            <i class="bx bxs-conversation"></i><span>liste Reclamations</span></i>
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
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse">
          <i class="bx bxs-conversation"></i><span>Reclamations</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{url('/reclamations/liste')}}">
              <i class="bi bi-circle"></i><span>liste des reclamations</span>
            </a>
          </li>
          <li>
            <a href="{{url('/reclamations/create')}}">
              <i class="bi bi-circle"></i><span>Envoyer reclamation</span>
            </a>
          </li>
        </ul>
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

</aside><!-- End Sidebar-->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
    // Récupérer l'URL de la page en cours
    var currentUrl = window.location.href;

    // Parcourir chaque lien de la barre latérale
    $('#sidebar-nav a').each(function() {
      var linkUrl = $(this).attr('href');

      // Comparer l'URL du lien avec l'URL de la page en cours
      if (currentUrl === linkUrl) {
        // Ajouter la classe active à l'élément parent (li)
        $(this).removeClass('collapsed');
      }
    });
  });
</script>