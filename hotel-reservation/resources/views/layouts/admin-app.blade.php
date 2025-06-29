admin-app.blade.php

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
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
</head>
<style>
    .nav-menu {
        list-style: none;
        padding: 0 15px;
    }

    .nav-item {
        margin-bottom: 5px;
        border-radius: 8px;
        overflow: hidden;
    }

    .nav-link {
        display: flex;
        align-items: center;
        padding: 14px 20px;
        text-decoration: none;
        color: #4b5563 !important; /* Medium gray with !important to override */
        font-weight: 500;
        transition: var(--transition);
        gap: 12px;
        border-left: 3px solid transparent;
    }

    .nav-link i {
        font-size: 1.1rem;
        color: #4b5563 !important; /* Medium gray for icons with !important */
        width: 24px;
        text-align: center;
    }

    .nav-link:hover,
    .nav-link.active {
        background: #eef2ff;
        color: var(--primary) !important;
        border-left-color: var(--primary);
    }

    .nav-link:hover i,
    .nav-link.active i {
        color: var(--primary) !important;
    }

    .nav-link.logout {
        color: var(--danger) !important;
    }

    .nav-link.logout:hover {
        background: #fee2e2;
        border-left-color: var(--danger);
    }

    .nav-link.logout i {
        color: var(--danger) !important;
    }
</style>
<body>
  <div class="admin-container">
        <!-- Header -->
        <header class="admin-header">
            <div class="header-left">
                <button class="nav-toggle">
                    <i class="bi bi-list"></i>
                </button>
                <h3>Dashboard</h3>
            </div>
            <div class="header-right">
                <div class="user-info">
                    <div class="user-avatar">SA</div>
                    <span>Super Admin</span>
                </div>
                <button class="logout-btn">
                    <i class="bi bi-box-arrow-right"></i>
                    <span>Logout</span>
                </button>
            </div>
        </header>

        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-header">
                <div class="logo-container">
                    <i class="bi bi-building"></i>
                    <h2>Hotel Admin</h2>
                </div>
                <button class="close-sidebar">
                    <i class="bi bi-x-lg"></i>
                </button>
            </div>
            <nav>
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="{{ route('admin-dashboard') }}" 
                    class="nav-link {{ request()->routeIs('admin-dashboard') ? 'active' : '' }}">
                        <i class="bi bi-speedometer2"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                @can('create-booking')
                <li class="nav-item">
                    <a href="{{ route('admin-rooms') }}" 
                    class="nav-link {{ request()->routeIs('admin-rooms') ? 'active' : '' }}">
                        <i class="bi bi-door-open"></i>
                        <span>Room Management</span>
                    </a>
                </li>
                @endcan
                @can('create-booking')
                <li class="nav-item">
                    <a href="{{ route('admin-bookings') }}" 
                    class="nav-link {{ request()->routeIs('admin-bookings') ? 'active' : '' }}">
                        <i class="bi bi-calendar-check"></i>
                        <span>Booking Management</span>
                    </a>
                </li>
                @endcan
                @can('view-user')
                <li class="nav-item">
                    <a href="{{ route('admin-employees') }}" 
                    class="nav-link {{ request()->routeIs('admin-employees') ? 'active' : '' }}">
                        <i class="bi bi-people"></i>
                        <span>Employees</span>
                    </a>
                </li>
                @endcan
                
            </ul>
        </nav>
        </aside>

        

        <main class="container">
            @yield('content')
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script src={{ asset('js\admin.js') }}></script>
</body>
</html>
