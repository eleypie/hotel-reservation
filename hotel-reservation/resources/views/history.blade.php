<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Home | TheHaven</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Experience luxury in our Deluxe Room with premium amenities and stunning views">

    <!-- Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css">

    <!-- Custom CSS -->
    <link href="{{ asset('css/history.css') }}" rel="stylesheet" />  
</head>
<body>
        <!-- Header Section -->
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
                    
                    <li class="nav-profile">
                        <div class="profile-dropdown">
                            <button class="profile-toggle">
                                <div class="profile-pic-container">
                                    <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Profile" class="profile-pic">
                                </div>
                                <span class="profile-name">John D.</span>
                                <i class="fas fa-chevron-down dropdown-arrow"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a href="#"><i class="fas fa-history"></i> My Stays</a>
                                <a href="#"><i class="fas fa-sign-out-alt"></i> Sign Out</a>
                            </div>
                        </div>
                    </li>

                    <div class="auth-buttons">
                        <a href="{{ route('signin') }}" class="sign-in">Sign In</a>
                        <a href="{{ route('create-account') }}" class="sign-up">Create Account</a>
                    </div>
                </ul>
            </nav>  
        </div>
    </header>
<body>
        <div class="container">
        <!-- History Header -->
        <div class="history-header">
            <h1 class="history-title">Booking History</h1>
        </div>

        <!-- Booking Cards -->
        <div class="booking-card">
            <div class="booking-header">
                <span class="booking-id">Booking #12345</span>
                <span class="booking-status status-completed">Completed</span>
            </div>
            <div class="booking-body">
                <img src="https://res.cloudinary.com/lastminute/image/upload/q_auto/v1746440041/Genel_Goruntu_5_x1tmz0.jpg" alt="Deluxe Room" class="room-image">
                <div class="booking-details">
                    <h3 class="room-name">Deluxe Room</h3>
                    <div class="booking-date">
                        <i class="far fa-calendar-alt"></i> Jun 25 - Jun 30, 2024 (5 nights)
                    </div>
                    <p>Premium Ocean View • 45 sqm • 2 Adults + 1 Child</p>
                    <div class="amenities">
                        <span class="amenity-badge">
                            <i class="fas fa-wifi"></i> WiFi
                        </span>
                        <span class="amenity-badge">
                            <i class="fas fa-tv"></i> TV
                        </span>
                        <span class="amenity-badge">
                            <i class="fas fa-snowflake"></i> AC
                        </span>
                        <span class="amenity-badge">
                            <i class="fas fa-wine-bottle"></i> Mini Bar
                        </span>
                    </div>
                </div>
            </div>
            <div class="booking-footer">
                <div class="booking-price">$1,200.00</div>
                <div class="action-btns">
                    <button class="btn btn-outline">View Receipt</button>
                    <button class="btn btn-primary">Book Again</button>
                </div>
            </div>
        </div>

    
        <div class="booking-card">
            <div class="booking-header">
                <span class="booking-id">Booking #12346</span>
                <span class="booking-status status-completed">Completed</span>
            </div>
            <div class="booking-body">
                <img src="images/family-1.jpg" alt="Family Room" class="room-image">
                <div class="booking-details">
                    <h3 class="room-name">Family Room</h3>
                    <div class="booking-date">
                        <i class="far fa-calendar-alt"></i> Jul 15 - Jul 20, 2024 (5 nights)
                    </div>
                    <p>City View • 60 sqm • 2 Adults + 2 Children</p>
                    <div class="amenities">
                        <span class="amenity-badge">
                            <i class="fas fa-wifi"></i> WiFi
                        </span>
                        <span class="amenity-badge">
                            <i class="fas fa-tv"></i> TV
                        </span>
                        <span class="amenity-badge">
                            <i class="fas fa-utensils"></i> Breakfast
                        </span>
                    </div>
                </div>
            </div>
            <div class="booking-footer">
                <div class="booking-price">$1,200.00</div>
                <div class="action-btns">
                    <button class="btn btn-outline">View Receipt</button>
                    <button class="btn btn-primary">Book Again</button>
                </div>
            </div>
        </div>

        <!-- Empty State (Hidden by default) -->
        <!-- <div class="empty-history">
            <div class="empty-icon">
                <i class="far fa-calendar-alt"></i>
            </div>
            <h3>No Bookings Yet</h3>
            <p>Your upcoming and past bookings will appear here</p>
            <button class="btn btn-primary">Browse Rooms</button>
        </div> -->
    </div>
</body>
</html>