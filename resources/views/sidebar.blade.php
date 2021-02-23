<!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      
      <span class="brand-text font-weight-light">Level : {{ ucwords($data['user']->akses_page)}}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        
        <div class="info">
          <a href="#" class="d-block">Hi, <strong>{{ ucwords($data['user']->name) }}</strong></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        
          <li class="nav-item">
            <a href="{{ url('/')}}/" class="nav-link">
            <i class="fas fa-home"></i>
              <p>Home</p>
            </a>
          </li>
          <li class="nav-item ">
            <a href="{{url('/')}}/author" class="nav-link">
            <i class="fas fa-file-alt"></i>
              <p>Author</p>
            </a>
          </li>
          <li class="nav-item ">
            <a href="{{url('/')}}/" class="nav-link ">
            <i class="fas fa-cog"></i>
              <p>Buku</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('/')}}/logout" class="nav-link">
              <i class="fas fa-sign-out-alt"></i>
              <p>Logout</p>
            </a>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
