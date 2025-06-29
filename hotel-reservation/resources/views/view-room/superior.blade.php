@extends('layouts.app') 

@section('content')

@section('title', 'Superior')

@include('nav')

    <!-- Main Content Section -->
    <section class="full-page-section">
        <!-- Carousel Column -->
        <div class="carousel-column">
            <div id="mainCarousel" class="carousel slide h-100" data-bs-ride="carousel">
                <div class="carousel-inner h-100">
                    <div class="carousel-item active h-100">
                        <img src="../images/deluxe-1.jpg" class="d-block w-100" alt="Superior Room">
                    </div>
                    <div class="carousel-item h-100">
                        <img src="../images/deluxe-2.jpg" class="d-block w-100" alt="Bathroom">
                    </div>
                    <div class="carousel-item h-100">
                        <img src="../images/deluxe-3.jpg" class="d-block w-100" alt="City View">
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
                                    <img src="../images/deluxe-1.jpg" class="d-block w-100 selected" data-bs-target="#mainCarousel" data-bs-slide-to="0" alt="Thumbnail 1">
                                </div>
                                <div class="col-4">
                                    <img src="../images/deluxe-2.jpg" class="d-block w-100" data-bs-target="#mainCarousel" data-bs-slide-to="1" alt="Thumbnail 2">
                                </div>
                                <div class="col-4">
                                    <img src="../images/deluxe-3.jpg" class="d-block w-100" data-bs-target="#mainCarousel" data-bs-slide-to="2" alt="Thumbnail 3">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Room Details Column -->
        <div class="details-column">
            <h1 class="room-title">Superior Room</h1>
            <p class="room-description">A well-appointed space ideal for guests seeking a stylish and cozy stay.</p>
            
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
                        <i class="fa fa-laptop amenity-icon"></i>
                        <span>Work Desk</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="amenity-item">
                        <i class="fas fa-bed amenity-icon"></i>
                        <span>Twins Bed</span>
                    </div>
                    <div class="amenity-item">
                        <i class="fas fa-snowflake amenity-icon"></i>
                        <span>Air Conditioning</span>
                    </div>
                    <div class="amenity-item">
                        <i class="fas fa-coffee amenity-icon"></i>
                        <span>Coffee & Tea Maker</span>
                    </div>
                </div>
            </div>

            <h4 class="mt-4">Availability</h3>
            <!-- Date Range Picker -->
            <input type="text" class="form-control daterange-input" id="daterange" placeholder="Select dates" name="daterange">

            <!--
            <h3 class="mt-4">Reviews</h3>
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
                <a href="{{ route('booking-superior') }}" style="text-decoration: none;">
                    
                    <div class="price-amount">₱3,800 <span class="text-muted">/ night</span></div>
                    <div class="button-group">
                    <button class="book-btn">Book Now</button>
                    </div>
                </a>
            </div>

            <div class="continue-shopping">
            <a href="{{ route('room') }}" class="continue-btn"> Continue Browsing Rooms</a>
            </div>
        </div>
    </section>
@endsection