<!-- start nav -->
<nav class="navbar navbar-expand-lg fixed-top  ">
    <a class="navbar-brand" href="{{route('home')}}"><img src="{{ asset('frontend/html/img/home-1-logo.png')}}" alt="" ></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <i class="fa-solid fa-bars"></i>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link {{str_contains(Request::url(), 'home') ? 'current' : ''}}" href="{{ route('home')}}">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{str_contains(Request::url(), 'about') ? 'current' : ''}}" href="{{ route('about')}}">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{str_contains(Request::url(), 'Prevention') ? 'current' : ''}}" href="{{ route('Prevention')}}">Prevention</a>
          </li>
        <li class="nav-item">
            <a class="nav-link {{str_contains(Request::url(), 'contact') ? 'current' : ''}}" href="{{ route('contact')}}">Contact</a>
          </li>
          @guest
          <li class="nav-item btnav">
            <a href="{{ route('login')}}" class=" theme_btn tp_two ">login</a>
          </li>
          @endguest

          @auth
          <li class="nav-item btnav">
            <div class="btn-group">
              <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                {{Auth::user()->name}}
              </button>
              <div class="dropdown-menu">
              @if(Auth::user()->is_admin == 1)
                <a class="dropdown-item" href="{{ route('dashboard')}}">Dashboard</a>
              @endif
                <a class="dropdown-item" href="{{ route('form.index')}}">Your reservations</a>
                <a class="dropdown-item" href="{{ route('centers')}}">create reservation</a>
              
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit(); " href="{{ route('logout')}}">Logout</a>
              </div>
            </div> 
          </li>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none"> @csrf </form>

          @endauth
      </ul>
     
     
    </div>
  </nav>
<!-- end nav -->
