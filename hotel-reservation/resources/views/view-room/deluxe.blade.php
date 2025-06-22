<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Deluxe Room | TheHaven</title>
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
    <link href="{{ asset('css/view-room.css') }}" rel="stylesheet" />
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

    <!-- Main Content Section -->
    <section class="full-page-section">
        <!-- Carousel Column -->
        <div class="carousel-column">
            <div id="mainCarousel" class="carousel slide h-100" data-bs-ride="carousel">
                <div class="carousel-inner h-100">
                    <div class="carousel-item active h-100">
                        <img src="../images/superior-2.jpg" class="d-block w-100" alt="Deluxe Room">
                    </div>
                    <div class="carousel-item h-100">
                        <img src="../images/superior-1.jpg" class="d-block w-100" alt="Bathroom">
                    </div>
                    <div class="carousel-item h-100">
                        <img src="../images/superior-3.jpg" class="d-block w-100" alt="City View">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#mainCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#mainCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

            <!-- Thumbnail Carousel -->
            <div class="thumbnails-container">
                <div id="carousel-thumbs" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row gx-2">
                                <div class="col-4">
                                    <img src="../images/superior-2.jpg" class="d-block w-100 selected" data-bs-target="#mainCarousel" data-bs-slide-to="0" alt="Thumbnail 1">
                                </div>
                                <div class="col-4">
                                    <img src="../images/superior-1.jpg" class="d-block w-100" data-bs-target="#mainCarousel" data-bs-slide-to="1" alt="Thumbnail 2">
                                </div>
                                <div class="col-4">
                                    <img src="../images/superior-3.jpg" class="d-block w-100" data-bs-target="#mainCarousel" data-bs-slide-to="2" alt="Thumbnail 3">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Room Details Column -->
        <div class="details-column">

            <h1 class="room-title">Deluxe Room</h1>
            <p class="room-description">Perfect for solo travelers or couples looking for comfort and elegance with a city view.</p>
            
            <h3 class="mt-4">Amenities</h3>
            <div class="row mt-3">
                <div class="col-md-6">
                    <div class="amenity-item">
                        <i class="fas fa-wifi amenity-icon"></i>
                        <span>Wi-Fi</span>
                    </div>
                    <div class="amenity-item">
                        <i class="fas fa-tv amenity-icon"></i>
                        <span>Smart TV</span>
                    </div>
                    <div class="amenity-item">
                        <i class="fas fa-shower amenity-icon"></i>
                        <span>Hot & Cold Shower</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="amenity-item">
                        <i class="fas fa-bed amenity-icon"></i>
                        <span>Queen Bed</span>
                    </div>
                    <div class="amenity-item">
                        <i class="fas fa-snowflake amenity-icon"></i>
                        <span>Air Conditioning</span>
                    </div>
                    <div class="amenity-item">
                        <i class="fas fa-wine-bottle amenity-icon"></i>
                        <span>Mini Bar</span>
                    </div>
                </div>
            </div>

            <h4 class="mt-4">Availability</h3>
            <!-- Date Range Picker -->
            <input type="text" id="dateRange" class="form-control mt-2" placeholder="Select date range" readonly>

            <!-- Reviews Section 
            <h3 class="mt-4">Reviews</h3>
            
            <div class="reviews-container">
                <div class="review-item">
                    <img src="https://img.freepik.com/free-photo/young-beautiful-woman-pink-warm-sweater-natural-look-smiling-portrait-isolated-long-hair_285396-896.jpg" alt="Cara Rawback" class="reviewer-avatar">
                    <div class="review-content">
                        <div class="reviewer-info">
                            <div class="reviewer-name">Cara Rawback</div>
                            <div class="review-date">16.03.2022</div>
                        </div>
                        <div class="star-rating">
                            <span class="star filled">★</span>
                            <span class="star filled">★</span>
                            <span class="star filled">★</span>
                            <span class="star filled">★</span>
                            <span class="star filled">★</span>
                        </div>
                        <div class="review-text">
                            Excellent service and comfortable stay. Would definitely recommend!
                        </div>
                    </div>
                </div>
              <div class="review-item">
                    <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80" alt="Lily Crawford" class="reviewer-avatar">
                    <div class="review-content">
                        <div class="reviewer-info">
                            <div class="reviewer-name">Lily Crawford</div>
                            <div class="review-date">11.03.2022</div>
                        </div>
                        <div class="star-rating">
                            <span class="star filled">★</span>
                            <span class="star filled">★</span>
                            <span class="star filled">★</span>
                            <span class="star filled">★</span>
                            <span class="star empty">★</span>
                        </div>
                        <div class="review-text">
                            Beautiful room with great amenities. The view was spectacular.
                        </div>
                    </div>
                </div>
            </div>
            -->
            <div class="price-section mt-4">
                <a href="{{ route('booking-deluxe') }}" style="text-decoration: none;">
                    
                    <div class="price-amount">₱3,200 <span class="text-muted">/ night</span></div>
                    <div class="button-group">
                    <button class="book-btn">Book Now</button>
                    <button class="cart-btn">Add To Cart</button>
                    </div>
                </a>
            </div>

            <div class="continue-shopping">
            <a href="{{ route('room') }}" class="continue-btn"> Continue Browsing Rooms</a>
            </div>
        </div>
    </section>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Litepicker JS -->
    <script src="https://cdn.jsdelivr.net/npm/litepicker/dist/bundle.js"></script>

    <!-- Custom Scripts -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const mainCarousel = document.getElementById('mainCarousel');
            const thumbnails = document.querySelectorAll('#carousel-thumbs img');
            
            mainCarousel.addEventListener('slid.bs.carousel', function (e) {
                const activeIndex = e.to;
                
                thumbnails.forEach((thumb, index) => {
                    thumb.classList.remove('selected');
                    if (parseInt(thumb.getAttribute('data-bs-slide-to')) === activeIndex) {
                        thumb.classList.add('selected');
                    }
                });
            });
            
            thumbnails.forEach(thumb => {
                thumb.addEventListener('click', function() {
                    thumbnails.forEach(t => t.classList.remove('selected'));
                    this.classList.add('selected');
                });
            });
        });
    </script>
</body>
</html>