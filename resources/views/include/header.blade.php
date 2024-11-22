<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="{{url('/')}}" class="logo d-flex align-items-center">
        <span class="d-none d-lg-block">MedicoNet</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    
    <div class="search-bar">
      <form class="search-form d-flex align-items-center" action="{{route('searchDoctor')}}" method="GET">
        @csrf
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->
    
    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->
        

        @foreach(auth()-> user()->roles as $role)
        @if($role->nom !== 'admin')
        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>
            <span class="badge bg-primary badge-number">{{ auth()->user()->unreadNotifications->count() }}</span>
          </a><!-- End Messages Icon -->
          @foreach(auth()->user()->unreadNotifications as $notification)
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
            <li class="dropdown-header">
                <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2"></span> Nouveaux notifications</a>
            </li>
            <li>
                <hr class="dropdown-divider">
            </li>
            <li class="message-item">
              <a href="{{ route('discussion', ['destinataireId' =>  $notification->data['destinataire']]) }}">
                    <img src="assets/img/messages-1.jpg" alt="" class="rounded-circle">
                    <div>
                        <p>{{ $notification->data['message'] }}</p>
                        <p>{{ $notification->created_at->diffForHumans() }}</p>
                    </div>
                </a>
            </li>
            <li>
                <hr class="dropdown-divider">
            </li>

            <li class="dropdown-footer">
                <a href="{{ route('markAllMessagesAsRead') }}">Marquer tous les notifications comme lus</a>
            </li>
          </ul>
          @endforeach
        </li>
        @endif
        @endforeach


        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="{{asset('dash/img/profile.png')}}" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">{{auth()-> user()-> nom}}.{{auth()-> user()-> prenom}}</span>
          </a>

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>{{auth()-> user()-> email}}</h6>
              <span>@foreach(auth()-> user()->roles as $role)
                {{ $role->nom }}<br>
                @endforeach</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{url('/profile')}}">
                <i class="bi bi-person"></i>
                <span>Mon Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="{{route('logout')}}">
                <i class="bi bi-box-arrow-right"></i>
                <span>Déconnecter</span>
              </a>
            </li>

          </ul>
        </li>

      </ul>
    </nav>

</header>