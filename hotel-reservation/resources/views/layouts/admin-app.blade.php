<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Admin Panel')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>
<body>
    <div id="adminContainer" class="admin-container" style="display: block;">
        <header class="admin-header">
            <button onclick="showSideNav()" id="openNavbar" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="bi bi-list"></i>
            </button> 
            <button class="logout-btn" action="{{ route('logout')}}">
                <i class="bi bi-box-arrow-right"></i> 
                    <a style="color:white; text-decoration: none;" href="{{ route('logout')}}">Logout</a>
            </button>
        </header>
        <aside class="sidebar" id="sideNav">
            <button onclick="showSideNav()" id="closeNavbar">
                <i class="bi bi-x-lg"></i>
            </button>
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <div class="sidebar-nav row collapse navbar-collapse" id="navbarContent">
                        <div class="sidebar-header" style="align-items: center;">
                            <h2>Hotel Admin</h2>
                        </div>                
                        <ul class="nav-menu">
                            <li class="nav-item"><a class="nav-link" href="{{ route('admin-dashboard') }}">Dashboard</a></li>

                            @can('view-room')
                                <li class="nav-item"><a class="nav-link" href="{{ route('admin-rooms') }}">Room Management</a></li>
                            @endcan
                            
                            @can('create-booking')
                            <li class="nav-item"><a class="nav-link" href="{{ route('admin-bookings') }}">Booking Management</a></li>
                            @endcan

                            @can('view-user')
                                <li class="nav-item"><a class="nav-link" href="{{ route('admin-employees') }}">Employees</a></li>
                            @endcan

                            <li class="nav-item"><a class="nav-link" href="#">Reports</a></li>
                            <li class="nav-item"><a class="nav-link text-danger" href="{{ route('logout')}}">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </aside>

        <main class="container">
            @yield('content')
        </main>
    </div>
    <script src={{ asset('js\admin.js') }}></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
