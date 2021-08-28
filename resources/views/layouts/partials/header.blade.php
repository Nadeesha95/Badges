<!-- Preloader -->
<div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{asset('img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
     
     
      <li class="nav-item d-none d-sm-inline-block">
     
        <a href="index3.html" class="nav-link">Home</a>
      </li>
   
     
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
    
      

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="nav-link">{{ Auth::user()->name }}</a>
        

          <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <li class="nav-item d-none d-sm-inline-block">
                                <a  class="nav-link"href="{{ route('logout') }}"
                                         onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                    </a>
                                  </li>
                            </form>
        </div>
      </li>
 
    
    </ul>
  </nav>
  <!-- /.navbar -->