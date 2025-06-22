<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>About | TheHaven</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Experience luxury in our Deluxe Room with premium amenities and stunning views">

    <!-- Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/5.3.45/css/materialdesignicons.css" integrity="sha256-NAxhqDvtY0l4xn+YVa6WjAcmd94NNfttjNsDmNatFVc=" crossorigin="anonymous" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- Custom CSS -->
    <link href="{{ asset('css/about.css') }}" rel="stylesheet" />  
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

<section class="about-section py-5">
    <div class="container">
        <!-- Section Header 
        <div class="section-header text-center mb-5">
            <span class="section-subtitle text-uppercase text-primary fw-bold d-block mb-2">Discover Your Sanctuary</span>
            <h2 class="section-title display-4 fw-bold mb-3">About The Haven</h2>
            <p class="section-description lead text-muted mx-auto" style="max-width: 700px;">
                Where luxury meets tranquility, and every moment becomes a cherished memory. 
                Experience unparalleled hospitality in our world-class resort destination.
            </p>
        </div>

        <!-- Main Content -->
        <div class="about-content row g-5 align-items-center mb-5">
            <div class="content-text col-lg-6">
                <h3 class="fw-bold mb-4">Your Perfect Escape Awaits</h3>
                <p class="mb-4">
                    Nestled in a breathtaking location where pristine nature meets refined elegance, 
                    The Haven Resort offers an extraordinary retreat from the ordinary. Our commitment 
                    to excellence has made us a premier destination for discerning travelers seeking 
                    both adventure and relaxation.
                </p>
                <p class="mb-4">
                    Since our founding, we've dedicated ourselves to creating unforgettable experiences 
                    that go beyond traditional hospitality. Every detail has been carefully crafted to 
                    ensure your stay is nothing short of exceptional.
                </p>
                <div class="highlight-text p-4 bg-light border-start border-4 border-primary">
                    <i class="bi bi-quote fs-1 text-primary opacity-25"></i>
                    <p class="mb-0 fst-italic">"At The Haven, we don't just provide accommodation – we create memories that last a lifetime."</p>
                </div>
            </div>
            <div class="content-image col-lg-6 position-relative">
                <img src="https://images.unsplash.com/photo-1571896349842-33c89424de2d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" 
                     alt="The Haven Resort" class="img-fluid rounded-3 shadow-lg w-100">
                <div class="image-overlay position-absolute bottom-0 start-0 end-0 p-3" style="background: rgba(0,0,0,0.6);">
                    <div class="row g-3">
                        <div class="col-md-4 text-center text-white">
                            <i class="bi bi-geo-alt-fill d-block fs-4 mb-1"></i>
                            <span class="small">Premium Beachfront Location</span>
                        </div>
                        <div class="col-md-4 text-center text-white">
                            <i class="bi bi-star-fill d-block fs-4 mb-1"></i>
                            <span class="small">5-Star Luxury Experience</span>
                        </div>
                        <div class="col-md-4 text-center text-white">
                            <i class="bi bi-award-fill d-block fs-4 mb-1"></i>
                            <span class="small">Award-Winning Service</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

       <!-- Redesigned Features Grid -->
<div class="features-grid row g-4 g-lg-5 mb-6">
    <div class="col-md-6 col-lg-3">
        <div class="card h-100 border-0 bg-transparent">
            <div class="card-body p-4 text-center hover-scale">
                <div class="icon-wrapper bg-white shadow-sm rounded-3 p-3 mb-4 mx-auto" style="width: 80px; height: 80px;">
                    <i class="bi bi-house-heart-fill fs-3 text-gradient-primary"></i>
                </div>
                <h4 class="fw-bold mb-3"> High Quality Accommodations</h4>
                <p class="text-muted mb-0">Experience comfort redefined in our elegantly appointed suites and villas, each designed with your ultimate relaxation in mind.</p>
            </div>
        </div>
    </div>
    
    <div class="col-md-6 col-lg-3">
        <div class="card h-100 border-0 bg-transparent">
            <div class="card-body p-4 text-center hover-scale">
                <div class="icon-wrapper bg-white shadow-sm rounded-3 p-3 mb-4 mx-auto" style="width: 80px; height: 80px;">
                    <i class="bi bi-water fs-3 text-gradient-primary"></i>
                </div>
                <h4 class="fw-bold mb-3">World-Class Amenities</h4>
                <p class="text-muted mb-0">From pristine pools to rejuvenating spas, every facility is crafted to provide you with an unparalleled resort experience.</p>
            </div>
        </div>
    </div>
    
    <div class="col-md-6 col-lg-3">
        <div class="card h-100 border-0 bg-transparent">
            <div class="card-body p-4 text-center hover-scale">
                <div class="icon-wrapper bg-white shadow-sm rounded-3 p-3 mb-4 mx-auto" style="width: 80px; height: 80px;">
                    <i class="bi bi-trophy-fill fs-3 text-gradient-primary"></i>
                </div>
                <h4 class="fw-bold mb-3">Exceptional Service</h4>
                <p class="text-muted mb-0">Our dedicated team of hospitality professionals ensures every need is anticipated and every expectation exceeded.</p>
            </div>
        </div>
    </div>
    
    <div class="col-md-6 col-lg-3">
        <div class="card h-100 border-0 bg-transparent">
            <div class="card-body p-4 text-center hover-scale">
                <div class="icon-wrapper bg-white shadow-sm rounded-3 p-3 mb-4 mx-auto" style="width: 80px; height: 80px;">
                    <i class="bi bi-geo-alt-fill fs-3 text-gradient-primary"></i>
                </div>
                <h4 class="fw-bold mb-3">Prime Location</h4>
                <p class="text-muted mb-0">Perfectly situated to offer both serene privacy and convenient access to local attractions and natural wonders.</p>
            </div>
        </div>
    </div>
</div>

        <!-- Stats Section -->
        <div class="stats-section bg-light rounded-3 p-4 mb-5">
            <div class="stats-grid row g-0 text-center">
                <div class="stat-item col-6 col-md-3 p-3">
                    <span class="stat-number d-block display-5 fw-bold">15+</span>
                    <span class="stat-label text-muted">Years of Excellence</span>
                </div>
                <div class="stat-item col-6 col-md-3 p-3">
                    <span class="stat-number d-block display-5 fw-bold">50K+</span>
                    <span class="stat-label text-muted">Happy Guests</span>
                </div>
                <div class="stat-item col-6 col-md-3 p-3">
                    <span class="stat-number d-block display-5 fw-bold">98%</span>
                    <span class="stat-label text-muted">Satisfaction Rate</span>
                </div>
                <div class="stat-item col-6 col-md-3 p-3">
                    <span class="stat-number d-block display-5 fw-bold">25+</span>
                    <span class="stat-label text-muted">Awards Won</span>
                </div>
            </div>
        </div>

>
    </div>
</section>

    <section class="newsletter-section">
        <div class="newsletter-container">
            <h2 class="newsletter-title">Stay Updated</h2>
            <p class="newsletter-description">Subscribe to receive exclusive offers and updates about The Haven Hotel</p>
            
            <form class="newsletter-form">
                <input type="email" class="newsletter-input" placeholder="Enter your email address" value="">
                <button class="newsletter-button" type="submit">Subscribe</button>
            </form>
        </div>
    </section>

    <footer class="bg-body-tertiary text-center text-lg-start">
        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05);">
            © 2025 Copyright:
            <a class="text-body" href=" ">The Haven</a>
        </div>
        <!-- Copyright -->
    </footer>
</body>
</html>