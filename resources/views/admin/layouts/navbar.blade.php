
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('home')}}" class="nav-link">Home</a>
      </li>
    
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Messages Dropdown Menu -->
    
      <!-- Notifications Dropdown Menu -->
     
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('home')}}" class="brand-link">
      <img src="{{ asset('frontend/dist/img/logo.png')}}" alt="AdminLTE Logo" class="brand-image  elevation-3" style="opacity: .8">
      
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('frontend/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth()->user()->name}}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ route('dashboard')}}" class="nav-link  {{str_contains(Request::url(), 'admin/dashboard') ? 'active' : ''}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
         
          <li class="nav-item">
            <a href="{{ route('user.index')}}" class="nav-link  {{str_contains(Request::url(), 'user') ? 'active' : ''}}">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                User
              </p>
            </a>
        
          </li>
         
          <li class="nav-item">
            <a href="{{ route('center.index')}}" class="nav-link  {{str_contains(Request::url(), 'center') ? 'active' : ''}} ">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Centers
                
              </p>
            </a>
        
          </li>
          <li class="nav-item">
            <a href="{{ route('disease.index')}}" class="nav-link {{str_contains(Request::url(), 'disease') ? 'active' : ''}}">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Diseases
                
              </p>
            </a>
        
          </li>
          <li class="nav-item">
            <a href="{{ route('symptom.index')}}" class="nav-link {{str_contains(Request::url(), 'symptom') ? 'active' : ''}}">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Symptoms
                
              </p>
            </a>
        
          </li>
          <li class="nav-item">
            <a href="{{ route('reservation.all')}}" class="nav-link {{str_contains(Request::url(), 'reservation') ? 'active' : ''}}">
              <i class="nav-icon fas fa-tree"></i>
              <p>
                Reservation
                
              </p>
            </a>
        
          </li>

          <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link"
             onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <i class="nav-icon fas fa-tree"></i>
              <p>
              logout
                
              </p>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none"> @csrf </form>

          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
