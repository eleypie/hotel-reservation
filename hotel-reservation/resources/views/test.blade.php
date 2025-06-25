<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css">

    <!-- Custom CSS -->
    <link href="{{ asset('css/contact.css') }}" rel="stylesheet" />
</head>
<body>
    <header>
        <div class="header-container">
            <a href="#" class="logo">TheHaven</a>
            
            <input type="checkbox" id="side-menu" class="side-menu">
            <label class="hamb" for="side-menu">
                <span class="hamb-line"></span>
            </label>
            
            <nav>
                <ul>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('room') }}">Rooms</a></li>
                    <li><a href="{{ route('ameneties') }}">Amenities</a></li>
                    <li><a href="{{ route('cart') }}">My Cart</a></li>
                    <li><a href="{{ route('contact') }}">Contact Us</a></li>
                    <li><a href="{{ route('about') }}">About Us</a></li>
                    @auth
                    <li class="nav-profile">
                        <div class="profile-dropdown">
                            <button class="profile-toggle" id="profileDropdown">
                                <div class="profile-pic-container">
                                    <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Profile" class="profile-pic">
                                </div>
                                <span class="profile-name">{{ Auth::user()->first_name }}</span>
                                <i class="fas fa-chevron-down dropdown-arrow"></i>
                            </button>
                            <div class="dropdown-menu" id="dropdownMenu">
                                <a href="#"><i class="fas fa-history"></i> My Stays</a>
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
    
    <!-- Add jQuery (required for some Bootstrap components) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom JavaScript for dropdown -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const profileDropdown = document.getElementById('profileDropdown');
            const dropdownMenu = document.getElementById('dropdownMenu');
            
            if (profileDropdown && dropdownMenu) {
                profileDropdown.addEventListener('click', function(e) {
                    e.preventDefault();
                    dropdownMenu.style.display = dropdownMenu.style.display === 'block' ? 'none' : 'block';
                });
                
                // Close dropdown when clicking outside
                document.addEventListener('click', function(e) {
                    if (!profileDropdown.contains(e.target) && !dropdownMenu.contains(e.target)) {
                        dropdownMenu.style.display = 'none';
                    }
                });
            }
        });
    </script>
</body>
</html>