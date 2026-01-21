<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>BASO AMMAR</title>

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">

  <!-- AdminLTE -->
  <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">

  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

  @vite('resources/js/app.js')
</head>

<style>
  .main-sidebar {
      background-color: #c0392b !important;
  }
  .brand-link {
      background-color: #a93226 !important;
      color: white !important;
  }
  .nav-sidebar .nav-link,
  .nav-sidebar .nav-link i {
      color: #ffffff !important;
  }
  .nav-sidebar .nav-link.active {
      background-color: #922b21 !important;
      color: #fff !important;
  }
  .nav-sidebar .nav-link:hover {
      background-color: #a93226 !important;
      color: #fff !important;
  }
  .nav-icon {
      color: white !important;
  }

  :root {
    --red-main: #c0392b;
    --red-soft: #f1948a;
    --red-dark: #922b21;
    --bg-soft: #f4f6f9;
}

/* Background content */
.content-wrapper {
    background-color: var(--bg-soft);
}

/* Sidebar */
.main-sidebar {
    background: linear-gradient(180deg, var(--red-main), var(--red-dark)) !important;
}
.brand-link {
    background-color: transparent !important;
    color: #fff !important;
    font-weight: bold;
}

/* Card modern */
.card {
    border-radius: 18px;
    border: none;
    box-shadow: 0 10px 25px rgba(0,0,0,.08);
}

/* Stat card */
.stat-card {
    border-radius: 20px;
    color: #fff;
    padding: 24px;
    position: relative;
    overflow: hidden;
}
.stat-card h3 {
    font-weight: bold;
}
.stat-card i {
    position: absolute;
    right: 20px;
    bottom: 20px;
    font-size: 48px;
    opacity: .2;
}

/* Variasi warna */
.bg-red {
    background: linear-gradient(135deg, #c0392b, #e74c3c);
}
.bg-soft-red {
    background: linear-gradient(135deg, #f1948a, #ec7063);
}
.bg-dark-red {
    background: linear-gradient(135deg, #922b21, #641e16);
}
</style>

<body class="hold-transition sidebar-mini layout-fixed">
@include('sweetalert::alert')

<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#">
          <i class="fas fa-bars"></i>
        </a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('dashboard') }}" class="nav-link">Home</a>
      </li>
    </ul>

    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <form action="{{ route('logout') }}" method="POST">
          @csrf
          <button type="submit" class="btn btn-link text-danger">
            Logout
          </button>
        </form>
      </li>
    </ul>
  </nav>

  <!-- Sidebar -->
  <x-admin.aside />

  <!-- Content Wrapper -->
  <div class="content-wrapper">

    <!-- Content Header -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">@yield('content_title')</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">
                <a href="{{ route('dashboard') }}">Home</a>
              </li>
              <li class="breadcrumb-item active">
                @yield('content_title')
              </li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        @yield('content')
      </div>
    </div>

  </div>

  <!-- Footer -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-inline">
      BASO AMMAR
    </div>
    <strong>
      Copyright &copy; {{ date('Y') }}
      <a href="#">BASO AMMAR</a>.
    </strong>
    All rights reserved.
  </footer>

</div>

<!-- REQUIRED SCRIPTS -->
<script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>

<!-- DataTables -->
<script src="{{ asset('adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

<script>
  $(function () {
    $("#table1").DataTable({
      responsive: true,
      lengthChange: true,
      autoWidth: false,
      buttons: ["print"]
    }).buttons().container().appendTo('#table1_wrapper .col-md-6:eq(0)');

    $('#table2').DataTable({
      paging: true,
      lengthChange: true,
      searching: true,
      ordering: true,
      info: true,
      autoWidth: true,
      responsive: true,
    });
  });
</script>

{{-- 🔥 INI YANG WAJIB UNTUK KASIR --}}
@stack('scripts')

</body>
</html>
