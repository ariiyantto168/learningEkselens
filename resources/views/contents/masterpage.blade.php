<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ env('ADMINLTE3') }}plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{ env('ADMINLTE3') }}plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ env('ADMINLTE3') }}plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ env('ADMINLTE3') }}plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ env('ADMINLTE3') }}dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ env('ADMINLTE3') }}plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ env('ADMINLTE3') }}plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ env('ADMINLTE3') }}plugins/summernote/summernote-bs4.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ env('ADMINLTE3') }}plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="{{ env('ADMINLTE3') }}plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{ env('ADMINLTE3') }}plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="{{ env('ADMINLTE3') }}plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.min.css">

  <!-- jQuery -->
<script src="{{ env('ADMINLTE3') }}plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ env('ADMINLTE3') }}plugins/jquery-ui/jquery-ui.min.js"></script>
<style>
    .textbox{
        background-color: #6c757d !important;
      }

    .blue{
      background-color: #020114 !important;
    }
</style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link btn" data-toggle="modal" data-target="#modal-logout" role="button">
          <i class="fas fa-sign-out-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  {{-- <aside class="main-sidebar sidebar-dark-primary elevation-4"> --}}
  <aside class="main-sidebar blue elevation-4" style="background-color: #152ca3 !important">
    <!-- Brand Logo -->
    {{-- <a href="index3.html" class="brand-link " style="color: #ffffff"> 
      <img src="{{ env('ADMINLTE3') }}dist/img/ICON.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text" >
      <img src="{{ env('ADMINLTE3') }}dist/img/White.png" alt="" style="width: 50%;height: auto; object-fit: cover">
      </span>
    </a> --}}

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ env('ADMINLTE3') }}dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block " style="text-decoration: none;cursor: none;color: #ffffff">Super Admin</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         
         
          <li class="nav-item " >
            <a href="{{ url('/') }}" class="nav-link" id="menu_home">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                Home
              </p>
            </a>
          </li> 
          {{-- @if (check_privileges('A00001'))     --}}
          <li class="nav-item has-treeview menu-open" >
            <a href="#" class="nav-link" id="menu_privileges">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Access  Application
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: block;">
              {{-- @if(check_privileges('A00003'))     --}}
              <li class="nav-item">
                <a href="{{ url('privileges/users') }}" class="nav-link" id="submenu_users">
                  <i class="far fa-user nav-icon"></i>
                  <p>User</p>
                </a>
              </li>
              {{-- @endif --}}
              <li class="nav-item">
                <a href="{{ url('privileges/module') }}" class="nav-link" id="submenu_module">
                  <i class="far fa-file nav-icon"></i>
                  <p>Add Modul Application</p>
                </a>
              </li>
            </ul>
          </li>
          {{-- lecture --}}
          <li class="nav-item has-treeview menu-open" >
            <a href="#" class="nav-link" id="menu_lecture">
              <i class="nav-icon fas fa-building"></i>
              <p>
                Materi Class
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: block;">
              {{-- @if(check_privileges('A00003'))     --}}
              <li class="nav-item">
                <a href="{{ url('lecture/categories') }}" class="nav-link" id="submenu_categories">
                  <i class="fas fa-cubes nav-icon"></i>
                  <p>Categories</p>
                </a>
              </li>
              {{-- @endif --}}
              <li class="nav-item">
                <a href="{{ url('lecture/class') }}" class="nav-link" id="submenu_class">
                  <i class="fas fa-school nav-icon"></i>
                  <p>Class</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('lecture/comments') }}" class="nav-link" id="submenu_comments">
                  <i class="fas fa-comments nav-icon"></i>
                  <p>Comment</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('lecture/testimonies') }}" class="nav-link" id="submenu_testimonies">
                  <i class="fas fa-user-graduate nav-icon"></i>
                  <p>Testimonies Users</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('lecture/whislists') }}" class="nav-link" id="submenu_whislists">
                  <i class="fas fa-heart nav-icon"></i>
                  <p>Whislists Users</p>
                </a>
              </li>
            </ul>
          </li>

          {{-- promosi --}}
          <li class="nav-item has-treeview menu-open" >
            <a href="#" class="nav-link" id="menu_promotions">
              <i class="nav-icon fas fa-ticket-alt"></i>
              <p>
                Promotion
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: block;">
              {{-- @if(check_privileges('A00003'))     --}}
              <li class="nav-item">
                <a href="{{ url('promotions/discounts') }}" class="nav-link" id="submenu_discounts">
                  <i class="fas fa-tags nav-icon"></i>
                  <p>Discounts</p>
                </a>
              </li>
              {{-- @endif --}}
              <li class="nav-item">
                <a href="{{ url('promotions/kupons') }}" class="nav-link" id="submenu_kupons">
                  <i class="fas fa-money-check-alt nav-icon"></i>
                  <p>kupons</p>
                </a>
              </li>
            </ul>
          </li>

          {{-- lecture --}}
          <li class="nav-item has-treeview menu-open" >
            <a href="#" class="nav-link" id="menu_trandings">
              <i class="nav-icon fas fa-share-alt-square"></i>
              <p>
                Trendings
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: block;">
              {{-- @if(check_privileges('A00003'))     --}}
              <li class="nav-item">
                <a href="{{ url('trandings/populers') }}" class="nav-link" id="submenu_populers">
                  <i class="fas fa-project-diagram nav-icon"></i>
                  <p>Class Populer</p>
                </a>
              </li>
              {{-- @endif --}}
              <li class="nav-item">
                <a href="{{ url('trandings/careers') }}" class="nav-link" id="submenu_careers">
                  <i class="fas fa-briefcase nav-icon"></i>
                  <p>Career Ready Program</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('trandings/newclass') }}" class="nav-link" id="submenu_class">
                  <i class="fas fa-chalkboard-teacher nav-icon"></i>
                  <p>New Class</p>
                </a>
              </li>
            </ul>
          </li>
          {{-- @endif --}}
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
    {!! $pagecontent !!}
  <!-- /.content-wrapper -->
  
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.0.0
    </div>
    <strong>Copyright © 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
    reserved.
  </footer>
  {{--  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.5
    </div>
  </footer>  --}}
</div>
<!-- ./wrapper -->

<!-- Modal -->
<div class="modal fade" id="modal-logout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Are you sure logout this application ?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="{{ url('logout') }}" class="btn btn-danger">Logout</a>
      </div>
    </div>
  </div>
</div>

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ env('ADMINLTE3') }}plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Sparkline -->
<script src="{{ env('ADMINLTE3') }}plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="{{ env('ADMINLTE3') }}plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="{{ env('ADMINLTE3') }}plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="{{ env('ADMINLTE3') }}plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="{{ env('ADMINLTE3') }}plugins/moment/moment.min.js"></script>
<script src="{{ env('ADMINLTE3') }}plugins/daterangepicker/daterangepicker.js"></script>
<!-- DataTables -->
<script src="{{ env('ADMINLTE3') }}plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{ env('ADMINLTE3') }}plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ env('ADMINLTE3') }}plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ env('ADMINLTE3') }}plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
{{--  <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>  --}}
<!-- Summernote -->
<script src="{{ env('ADMINLTE3') }}plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{ env('ADMINLTE3') }}plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ env('ADMINLTE3') }}dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ env('ADMINLTE3') }}dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ env('ADMINLTE3') }}dist/js/demo.js"></script>
<!-- Select2 -->
<script src="{{ env('ADMINLTE3')}}plugins/select2/js/select2.full.min.js"></script>
{{-- date --}}
<!-- Bootstrap 4 -->
<script src="{{env('ADMINLTE3')}}plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="{{env('ADMINLTE3')}}plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="{{env('ADMINLTE3')}}plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="{{env('ADMINLTE3')}}plugins/moment/moment.min.js"></script>
<script src="{{env('ADMINLTE3')}}plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<!-- date-range-picker -->
<script src="{{env('ADMINLTE3')}}plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="{{env('ADMINLTE3')}}plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{env('ADMINLTE3')}}plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="{{env('ADMINLTE3')}}plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- AdminLTE App -->
<script src="{{env('ADMINLTE3')}}dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{env('ADMINLTE3')}}dist/js/demo.js"></script>
<script src="{{env('ADMINLTE3')}}pages/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

<script>
  //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
    $(function () {
      $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
      });
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });

    $('#menu_{{$menu}}').addClass('active textbox');
    $('#submenu_{{$submenu}}').addClass('active textbox');
</script>
<script>
 $('.datepicker').datepicker({
   autoclose: true,
   dateFormat: 'yyyy-mm-dd'
 })
</script>

</body>
</html>
