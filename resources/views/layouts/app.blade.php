<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Modern Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}">
    <!-- AdminLTE -->
    <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            font-size: 15px;
            background-color: #f4f6f9;
        }
        .navbar-white {
            background-color: #ffffff !important;
            border-bottom: 1px solid #dee2e6;
        }
        .main-header .nav-link {
            font-weight: 500;
            color: #343a40 !important;
        }
        .nav-sidebar .nav-link.active {
            background-color: #0d6efd;
            color: #fff !important;
        }
        .nav-sidebar .nav-link:hover {
            background-color: #f1f1f1;
        }
        .main-footer {
            font-size: 14px;
            padding: 12px 20px;
        }
        .content-wrapper {
            padding: 20px;
        }
        .brand-text {
            font-weight: 600;
            font-size: 18px;
        }
        .alert ul {
            margin-bottom: 0;
        }
    </style>
    @stack('style-alt')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white shadow-sm">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                    <i class="fas fa-bars"></i>
                </a>
            </li>
        </ul>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link font-weight-bold" data-toggle="dropdown" href="#">
                    {{ auth()->user()->first_name . ' ' . auth()->user()->last_name }}
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a href="{{ route('admin.profile.show') }}" class="dropdown-item">
                        <i class="fas fa-user mr-2"></i> {{ __('My Profile') }}
                    </a>
                    <div class="dropdown-divider"></div>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="{{ route('logout') }}" class="dropdown-item"
                           onclick="event.preventDefault(); this.closest('form').submit();">
                            <i class="fas fa-sign-out-alt mr-2"></i> {{ __('Log Out') }}
                        </a>
                    </form>
                </div>
            </li>
        </ul>
    </nav>

    <!-- Sidebar -->
    <aside class="main-sidebar sidebar-dark-primary elevation-3">
        <a href="/" class="brand-link text-center">
            <img src="{{ asset('images/AdminLTELogo.png') }}" alt="Logo"
                 class="brand-image img-circle elevation-2" style="opacity: .9">
            <span class="brand-text">Ridho Second Brand</span>
        </a>
        @include('layouts.navigation')
    </aside>

    <!-- Main Content -->
    <div class="content-wrapper">
        @if($errors->any())
            <div class="container-fluid pt-3">
                <div class="alert alert-danger alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        @if(session()->has('message'))
            <div class="container-fluid pt-3">
                <div class="alert alert-{{ session('alert-type') }} alert-dismissible fade show">
                    <strong>{{ session('message') }}</strong>
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                </div>
            </div>
        @endif

        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="main-footer d-flex justify-content-between">
        <strong>&copy; 2025 <a href="#">RidhoSecondBrand</a></strong>
        <div class="d-none d-sm-inline">Terima kasih telah menggunakan platform kami</div>
    </footer>

</div>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('js/adminlte.min.js') }}" defer></script>
@stack('script-alt')
</body>
</html>
