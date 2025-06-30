<header>
        <div class="header-container">
        <a href="{{ route('home') }}" class="logo">
            <img src="{{ asset('images/logo.png') }}" alt="TheHaven Logo" class="logo-image">
            <span class="logo-text">TheHaven</span>
        </a>

         <!-- Replace Laravel's default favicon with your hotel logo -->
<link rel="shortcut icon" href="{{ asset('logo.ico') }}?v={{ time() }}">
   
            <input type="checkbox" id="side-menu" class="side-menu">
            <label class="hamb" for="side-menu">
                <span class="hamb-line"></span>
            </label>
            
            <nav>
                <ul>
                    @can('view-admin-site')
                        <li>
                            <a href="{{ route('admin-dashboard') }}">Admin Dashboard</a>
                        </li>
                    @endcan
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('room') }}">Rooms</a></li>
                    <li><a href="{{ route('ameneties') }}">Amenities</a></li>
                    <li><a href="{{ route('contact') }}">Contact Us</a></li>
                    <li><a href="{{ route('about') }}">About Us</a></li>
                    @auth
                    <li class="nav-profile">
                        <div class="profile-dropdown">
                            <button class="profile-toggle" id="profileDropdown">
                                <!-- Profile Picture
                                <div class="profile-pic-container">
                                    <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Profile" class="profile-pic">
                                </div>
                                 -->
                                <span class="profile-name">{{ Auth::user()->first_name }}</span>
                                <i class="fas fa-chevron-down dropdown-arrow"></i>
                            </button>
                            <div class="dropdown-menu" id="dropdownMenu">
                                <a href="{{ route('booking.history') }}"><i class="fas fa-history"></i> My Stays</a>
                                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button class="dropdown-item" type="submit"><i class="fas fa-sign-out-alt me-2"></i>Sign Out</button>
                            </form>
                            </div>
                        </div>
                    </li>
                    @endauth
                    @guest
                     <div class="auth-buttons">
                        <a href="{{ route('login') }}" class="sign-in">Sign In</a>
                        <a href="{{ route('register') }}" class="sign-up">Create Account</a>
                    </div>
                    @endguest
                </ul>
            </nav>  
        </div>
    </header>