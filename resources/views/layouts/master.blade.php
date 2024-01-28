<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{csrf_token()}}">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>BioPhysicsLab</title>
  <link rel="shortcut icon" type="image/x-icon" href="{{asset('dist/img/logo.png')}}">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
  <!--Data Table-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />

  @yield('extra-css')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> -->
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
        <form action="{{route('logout')}}" method="POST">
            @csrf
            <button class="btn btn-outline-success" style="margin-right: 10px;"><i class="fas fa-sign-out-alt" style="margin-right: 5px;"></i>Logout</button>
        </form> 
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">YU Dashboard</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <!-- <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Starter Pages
                <i class="right fas fa-angle-left"></i>
              </p>
            </a> -->
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('admin.home')}}" class="nav-link @yield('home-active')">
                    &nbsp;<i class="fas fa-home"></i>&nbsp;&nbsp;
                    <p>Dashboard</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.principles')}}" class="nav-link @yield('principle-active')">
                    &nbsp;<i class="fas fa-user-graduate"></i>&nbsp;&nbsp;
                    <p>Principle</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.advisors')}}" class="nav-link @yield('advisor-active')">
                    &nbsp;<i class="fas fa-users-cog"></i>&nbsp;&nbsp;
                    <p>Advisor</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.users')}}" class="nav-link @yield('user-active')">
                    &nbsp;<i class="fas fa-user"></i>&nbsp;&nbsp;
                    <p>User Page</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.members')}}" class="nav-link @yield('member-active')">
                    <i class="fas fa-users"></i>&nbsp;&nbsp;
                    <p>Members Page</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.researches')}}" class="nav-link @yield('research-active')">
                    <i class="fab fa-researchgate"></i>&nbsp;&nbsp;
                    <p>Researches Page</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.projects')}}" class="nav-link @yield('project-active')">
                    <i class="fas fa-flask"></i>&nbsp;&nbsp;
                    <p>Laboratory Page</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.subjects')}}" class="nav-link @yield('subject-active')">
                    <i class="fas fa-chalkboard"></i>&nbsp;&nbsp;
                    <p>Subjects Page</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.news')}}" class="nav-link @yield('news-active')">
                    <i class="fas fa-newspaper"></i>&nbsp;&nbsp;
                    <p>News Page</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.publications')}}" class="nav-link @yield('publication-active')">
                    <i class="fas fa-upload"></i>&nbsp;&nbsp;
                    <p>Publication Page</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  @yield('content')
  <!-- Control Sidebar -->
  

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2023 <a href="https://adminlte.io">BigTech International</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
<!--DataTable-->
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>

<!--Sweet Alert-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function(){
        let token = document.head.querySelector('meta[name = "csrf-token"]');
        if(token)
        {
        $.ajaxSetup({
            headers : {
            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            }
        });
        }
    });
    const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})

@if(session('create'))
Toast.fire({
  icon: 'success',
  title: "{{session('create')}}"
})
@endif

@if(session('update'))
Toast.fire({
  icon: 'success',
  title: "{{session('update')}}"
})
@endif

</script>
@yield('scripts')
</body>
</html>
