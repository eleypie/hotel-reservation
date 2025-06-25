@extends('layouts.app') 

@section('content')

@section('title', 'Home')

@include('nav')

    <!-- Hero Section -->
<section class="hero-section">
    <div class="hero-content">
        <h1>Your perfect stay awaits</h1>
        <p>Book your next escape with luxury and comfort in the heart of the city</p>
    </div>
    
    <!-- Search Box 
    <div class="search-box">
        <form class="search-form">
        <div class="form-group">
            <label for="daterange">Check-in & Check-out</label>
            <i class="far fa-calendar-alt"></i>
            <input type="text" class="form-control" id="date-range" name="date-range" placeholder="Select dates and times" />
            <input type="hidden" id="check-in" name="check-in">
                        <input type="hidden" id="check-out" name="check-out">
        </div>
                    
            <div class="form-group">
                <label for="guests">Guests</label>
                <i class="fas fa-user-friends"></i>
                <select id="guests">
                    <option value="1">1 Guest</option>
                    <option value="2">2 Guests</option>
                    <option value="3">3 Guests</option>
                    <option value="4">4 Guests</option>
                    <option value="5+">5+ Guests</option>
                </select>
            </div>
            
            <button type="submit" class="search-btn">Search Availability</button>
        </form>
    </div>
    -->
</section>

        <!-- Featured Rooms Section -->
    <section class="section" id="rooms">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Featured Rooms</h2>
                <p class="section-subtitle">Discover our most popular accommodations, each designed for comfort and luxury</p>
            </div>
            
            <div class="rooms-grid">
                <!-- Room 1 -->
                <div class="room-card">
                <img src="images/superior-2.jpg" alt="Deluxe Room " class="room-image">
                    <div class="room-content">
                        <div class="room-header">
                            <h3 class="room-title">Deluxe Suite</h3>
                            <div class="room-price">
                                <div class="price-amount">₱3,200</div>
                                <div class="price-text">per night</div>
                            </div>
                        </div>
                        <p class="room-description">A cozy and comfortable room ideal for solo travelers or couples seeking a restful stay on a budget.</p>
                        
 <div class="room-features">
                            <span class="feature-badge">
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M2 4v16"></path><path d="M2 8h18a2 2 0 0 1 2 2v10"></path><path d="M2 17h20"></path><path d="M6 8v9"></path>
                                </svg>
                                Queen Bed
                            </span>
                            <span class="feature-badge">
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M12 20h.01"></path><path d="M2 8.82a15 15 0 0 1 20 0"></path><path d="M5 12.859a10 10 0 0 1 14 0"></path><path d="M8.5 16.429a5 5 0 0 1 7 0"></path>
                                </svg>
                                WiFi
                            </span>
                            <span class="feature-badge">
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <rect width="20" height="15" x="2" y="7" rx="2" ry="2"></rect><polyline points="17 2 12 7 7 2"></polyline>
                                </svg>
                                Smart TV
                            </span>
                            <span class="feature-badge">
                                <svg
                                width="24"
                                height="24"
                                viewBox="0 0 24 24"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                                >
                                <path
                                    d="M4 9C4 8.44772 4.44772 8 5 8H9C9.55228 8 10 8.44772 10 9C10 9.55228 9.55228 10 9 10H5C4.44772 10 4 9.55228 4 9Z"
                                    fill="currentColor"
                                />
                                <path
                                    fill-rule="evenodd"
                                    clip-rule="evenodd"
                                    d="M4 3C1.79086 3 0 4.79086 0 7V17C0 19.2091 1.79086 21 4 21H20C22.2091 21 24 19.2091 24 17V7C24 4.79086 22.2091 3 20 3H4ZM20 5H4C2.89543 5 2 5.89543 2 7V14H22V7C22 5.89543 21.1046 5 20 5ZM22 16H2V17C2 18.1046 2.89543 19 4 19H20C21.1046 19 22 18.1046 22 17V16Z"
                                    fill="currentColor"
                                />
                                </svg><link href="{{ asset('css/view-room.css') }}" rel="stylesheet" />
                                Air Conditioning
                            </span>
                            
                            <span class="feature-badge">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 -960 960 960"><path d="M200-160v-80h80v-160L40-760h560L360-400v160h80v80zm36-440h168l56-80H180zm404 440q-50 0-85-35t-35-85 35-85 85-35q11 0 21 1.5t19 6.5v-368h200v120H760v360q0 50-35 85t-85 35"/></svg>
                                Mini Bar
                            </span>
                            <span class="feature-badge">
                                <svg
                                width="24"
                                height="24"
                                viewBox="0 0 24 24"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                                >
                                <path
                                    fill-rule="evenodd"
                                    clip-rule="evenodd"
                                    d="M12.0001 1.13611L5.63604 7.50002C2.12132 11.0147 2.12132 16.7132 5.63604 20.2279C7.39343 21.9853 9.69679 22.864 12.0001 22.864C12.288 22.864 12.5759 22.8502 12.8627 22.8228C14.8706 22.6306 16.8264 21.7657 18.3641 20.2279C21.8788 16.7132 21.8788 11.0147 18.3641 7.50002L12.0001 1.13611ZM7.05025 8.91423L12 3.96448L12.0001 20.864C10.2086 20.864 8.41711 20.1806 7.05025 18.8137C4.31658 16.0801 4.31658 11.6479 7.05025 8.91423Z"
                                    fill="currentColor"
                                />
                                </svg>
                                Hot & Cold Shower
                            </span>
                        </div>
                        
                        <div class="room-actions">
                            <a href="{{ route('deluxe') }}"class="btn btn-outline">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0"></path><circle cx="12" cy="12" r="3"></circle>
                                </svg>
                                View Room
                            </a>
                            <!-- Booking Button 
                            <a href="/booking?roomId=1" class="btn btn-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M8 2v4"></path><path d="M16 2v4"></path><rect width="18" height="18" x="3" y="4" rx="2"></rect><path d="M3 10h18"></path>
                                </svg>
                                Book Now
                            </a>
                            -->
                        </div>
                    </div>
                </div>
                
                <!-- Room 2 -->
                <div class="room-card">
                    <img src="images/deluxe-1.jpg" alt="Superior Twin Room" class="room-image">
                    <div class="room-content">
                        <div class="room-header">
                            <h3 class="room-title">Superior Room</h3>
                            <div class="room-price">
                                <div class="price-amount">₱3,800</div>
                                <div class="price-text">per night</div>
                            </div>
                        </div>
                        <p class="room-description">A well-appointed space ideal for guests seeking a stylish and cozy stay.</p>
                         <div class="room-features">
                            <span class="feature-badge">
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M2 4v16"></path><path d="M2 8h18a2 2 0 0 1 2 2v10"></path><path d="M2 17h20"></path><path d="M6 8v9"></path>
                                </svg>
                                Twin Beds
                            </span>
                            <span class="feature-badge">
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M12 20h.01"></path><path d="M2 8.82a15 15 0 0 1 20 0"></path><path d="M5 12.859a10 10 0 0 1 14 0"></path><path d="M8.5 16.429a5 5 0 0 1 7 0"></path>
                                </svg>
                                WiFi
                            </span>
                            <span class="feature-badge">
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <rect width="20" height="15" x="2" y="7" rx="2" ry="2"></rect><polyline points="17 2 12 7 7 2"></polyline>
                                </svg>
                                Smart TV
                            </span>
                            <span class="feature-badge">
                                <svg
                                width="24"
                                height="24"
                                viewBox="0 0 24 24"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                                >
                                <path
                                    d="M4 9C4 8.44772 4.44772 8 5 8H9C9.55228 8 10 8.44772 10 9C10 9.55228 9.55228 10 9 10H5C4.44772 10 4 9.55228 4 9Z"
                                    fill="currentColor"
                                />
                                <path
                                    fill-rule="evenodd"
                                    clip-rule="evenodd"
                                    d="M4 3C1.79086 3 0 4.79086 0 7V17C0 19.2091 1.79086 21 4 21H20C22.2091 21 24 19.2091 24 17V7C24 4.79086 22.2091 3 20 3H4ZM20 5H4C2.89543 5 2 5.89543 2 7V14H22V7C22 5.89543 21.1046 5 20 5ZM22 16H2V17C2 18.1046 2.89543 19 4 19H20C21.1046 19 22 18.1046 22 17V16Z"
                                    fill="currentColor"
                                />
                                </svg>
                                Air Conditioning
                            </span>
                            <span class="feature-badge">
                                <svg
                                width="24"
                                height="24"
                                viewBox="0 0 24 24"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                                >
                                <path
                                    d="M6 2.5C5.44772 2.5 5 2.94772 5 3.5V5.5C5 6.05228 5.44772 6.5 6 6.5C6.55228 6.5 7 6.05228 7 5.5V3.5C7 2.94772 6.55228 2.5 6 2.5Z"
                                    fill="currentColor"
                                />
                                <path
                                    fill-rule="evenodd"
                                    clip-rule="evenodd"
                                    d="M13 21.5C15.973 21.5 18.441 19.3377 18.917 16.5H19C21.2091 16.5 23 14.7091 23 12.5C23 10.2909 21.2091 8.5 19 8.5V7.5H1V15.5C1 18.8137 3.68629 21.5 7 21.5H13ZM3 9.5V15.5C3 17.7091 4.79086 19.5 7 19.5H13C15.2091 19.5 17 17.7091 17 15.5V9.5H3ZM21 12.5C21 13.6046 20.1046 14.5 19 14.5V10.5C20.1046 10.5 21 11.3954 21 12.5Z"
                                    fill="currentColor"
                                />
                                <path
                                    d="M9 3.5C9 2.94772 9.44771 2.5 10 2.5C10.5523 2.5 11 2.94772 11 3.5V5.5C11 6.05228 10.5523 6.5 10 6.5C9.44771 6.5 9 6.05228 9 5.5V3.5Z"
                                    fill="currentColor"
                                />
                                <path
                                    d="M14 2.5C13.4477 2.5 13 2.94772 13 3.5V5.5C13 6.05228 13.4477 6.5 14 6.5C14.5523 6.5 15 6.05228 15 5.5V3.5C15 2.94772 14.5523 2.5 14 2.5Z"
                                    fill="currentColor"
                                />
                                </svg>
                                Coffee & Tea Maker
                            </span>
                            <span class="feature-badge">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 -960 960 960"><path d="M80-240v-480h800v480h-80v-80H640v80h-80v-400H160v400zm560-320h160v-80H640zm0 160h160v-80H640z"/></svg>
                                Work Desk
                            </span>
                        </div>
                        
                        <div class="room-actions">
                            <a href="{{ route('superior') }}" class="btn btn-outline">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0"></path><circle cx="12" cy="12" r="3"></circle>
                                </svg>
                                View Room
                            </a>
                            <!--
                            <a href="book-form/book-deluxe.html" class="btn btn-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M8 2v4"></path><path d="M16 2v4"></path><rect width="18" height="18" x="3" y="4" rx="2"></rect><path d="M3 10h18"></path>
                                </svg>
                                Book Now
                            </a>
                             -->
                        </div>
                    </div>
                </div>
                
                <!-- Room 3 -->
                <div class="room-card">
                    <img src="https://images.unsplash.com/photo-1590490360182-c33d57733427?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&h=600" alt="Presidential Suite" class="room-image">
                    <div class="room-content">
                        <div class="room-header">
                            <h3 class="room-title">Premier Room</h3>
                            <div class="room-price">
                                <div class="price-amount">₱4,500</div>
                                <div class="price-text">per night</div>
                            </div>
                        </div>
                        <p class="room-description">Ultimate luxury experience with separate living area, premium amenities, and concierge service.</p>
                        
             <div class="room-features">
                            <span class="feature-badge">
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M2 4v16"></path><path d="M2 8h18a2 2 0 0 1 2 2v10"></path><path d="M2 17h20"></path><path d="M6 8v9"></path>
                                </svg>
                                King Bed + Sofa Bed
                            </span>
                            
                            <span class="feature-badge">
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M12 20h.01"></path><path d="M2 8.82a15 15 0 0 1 20 0"></path><path d="M5 12.859a10 10 0 0 1 14 0"></path><path d="M8.5 16.429a5 5 0 0 1 7 0"></path>
                                </svg>
                                WiFi
                            </span>
                            <span class="feature-badge">
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <rect width="20" height="15" x="2" y="7" rx="2" ry="2"></rect><polyline points="17 2 12 7 7 2"></polyline>
                                </svg>
                                Smart TV
                            </span>

                            <span class="feature-badge">
                                <svg
                                width="24"
                                height="24"
                                viewBox="0 0 24 24"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                                >
                                <path
                                    d="M4 9C4 8.44772 4.44772 8 5 8H9C9.55228 8 10 8.44772 10 9C10 9.55228 9.55228 10 9 10H5C4.44772 10 4 9.55228 4 9Z"
                                    fill="currentColor"
                                />
                                <path
                                    fill-rule="evenodd"
                                    clip-rule="evenodd"
                                    d="M4 3C1.79086 3 0 4.79086 0 7V17C0 19.2091 1.79086 21 4 21H20C22.2091 21 24 19.2091 24 17V7C24 4.79086 22.2091 3 20 3H4ZM20 5H4C2.89543 5 2 5.89543 2 7V14H22V7C22 5.89543 21.1046 5 20 5ZM22 16H2V17C2 18.1046 2.89543 19 4 19H20C21.1046 19 22 18.1046 22 17V16Z"
                                    fill="currentColor"
                                />
                                </svg>
                                Air Conditioning
                            </span>

                            <span class="feature-badge">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-safe" viewBox="0 0 16 16">
                                <path d="M1 1.5A1.5 1.5 0 0 1 2.5 0h12A1.5 1.5 0 0 1 16 1.5v13a1.5 1.5 0 0 1-1.5 1.5h-12A1.5 1.5 0 0 1 1 14.5V13H.5a.5.5 0 0 1 0-1H1V8.5H.5a.5.5 0 0 1 0-1H1V4H.5a.5.5 0 0 1 0-1H1zM2.5 1a.5.5 0 0 0-.5.5v13a.5.5 0 0 0 .5.5h12a.5.5 0 0 0 .5-.5v-13a.5.5 0 0 0-.5-.5z"/>
                                <path d="M13.5 6a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5M4.828 4.464a.5.5 0 0 1 .708 0l1.09 1.09a3 3 0 0 1 3.476 0l1.09-1.09a.5.5 0 1 1 .707.708l-1.09 1.09c.74 1.037.74 2.44 0 3.476l1.09 1.09a.5.5 0 1 1-.707.708l-1.09-1.09a3 3 0 0 1-3.476 0l-1.09 1.09a.5.5 0 1 1-.708-.708l1.09-1.09a3 3 0 0 1 0-3.476l-1.09-1.09a.5.5 0 0 1 0-.708M6.95 6.586a2 2 0 1 0 2.828 2.828A2 2 0 0 0 6.95 6.586"/>
                                </svg>
                                In-Room Safe
                            </span>

                            <span class="feature-badge">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 -960 960 960"><path d="M280-80v-240h-64q-40 0-68-28t-28-68q0-29 16-53.5t42-36.5l262-116v-26q-36-13-58-43.5T360-760q0-50 35-85t85-35 85 35 35 85h-80q0-17-11.5-28.5T480-800t-28.5 11.5T440-760t11.5 28.5T480-720t28.5 11.5T520-680v58l262 116q26 12 42 36.5t16 53.5q0 40-28 68t-68 28h-64v240zm-64-320h64v-40h400v40h64q7 0 11.5-5t4.5-13q0-5-2.5-8.5T750-432L480-552 210-432q-5 2-7.5 5.5T200-418q0 8 4.5 13t11.5 5m144 240h240v-200H360zm0-200h240z"/></svg>
                                Bathrobe 
                            </span>
                        </div>
                        
                        <div class="room-actions">
                            <a href="{{ route('premier') }}" class="btn btn-outline">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0"></path><circle cx="12" cy="12" r="3"></circle>
                                </svg>
                                View Room
                            </a>
                            <!--
                            <a href="book-form/book-deluxe.html" class="btn btn-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M8 2v4"></path><path d="M16 2v4"></path><rect width="18" height="18" x="3" y="4" rx="2"></rect><path d="M3 10h18"></path>
                                </svg>
                                Book Now
                            </a>
                             -->
                        </div>
                    </div>
                </div>
                        

                            <!-- Booking Button 
                            <a href="/booking?roomId=1" class="btn btn-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M8 2v4"></path><path d="M16 2v4"></path><rect width="18" height="18" x="3" y="4" rx="2"></rect><path d="M3 10h18"></path>
                                </svg>
                                Book Now
                            </a>
                            -->
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="view-all">
                <a href="{{ route('room') }}" class="btn-view-all">View All Rooms</a>
            </div>
        </div>
    </section>

     <!-- Amenities Section -->
    <section class="amenities-section" id="amenities">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">World-Class Amenities</h2>
                <p class="section-subtitle">Indulge in luxury with our comprehensive range of premium facilities and services</p>
            </div>
            
            <div class="amenities-grid">
                <!-- Amenities Image -->
                <div>
                    <img src="https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&h=600" 
                         alt="Hotel Pool and Spa Area" 
                         class="amenities-image">
                </div>
                
                <!-- Amenities List -->
                <div class="amenities-list">
                    <!-- Amenity 1 -->
                    <div class="amenity-item">
                        <div class="amenity-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M2 6c.6.5 1.2 1 2.5 1C7 7 7 5 9.5 5c2.6 0 2.4 2 5 2 2.5 0 2.5-2 5-2 1.3 0 1.9.5 2.5 1"></path>
                                <path d="M2 12c.6.5 1.2 1 2.5 1 2.5 0 2.5-2 5-2 2.6 0 2.4 2 5 2 2.5 0 2.5-2 5-2 1.3 0 1.9.5 2.5 1"></path>
                                <path d="M2 18c.6.5 1.2 1 2.5 1 2.5 0 2.5-2 5-2 2.6 0 2.4 2 5 2 2.5 0 2.5-2 5-2 1.3 0 1.9.5 2.5 1"></path>
                            </svg>
                        </div>
                        <div class="amenity-content">
                            <h3>Infinity Pool & Spa</h3>
                            <p>Relax in our rooftop infinity pool with stunning city views and full-service spa treatments</p>
                        </div>
                    </div>
                    
                    <!-- Amenity 2 -->
                    <div class="amenity-item">
                        <div class="amenity-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M14.4 14.4 9.6 9.6"></path>
                                <path d="M18.657 21.485a2 2 0 1 1-2.829-2.828l-1.767 1.768a2 2 0 1 1-2.829-2.829l6.364-6.364a2 2 0 1 1 2.829 2.829l-1.768 1.767a2 2 0 1 1 2.828 2.829z"></path>
                                <path d="m21.5 21.5-1.4-1.4"></path>
                                <path d="M3.9 3.9 2.5 2.5"></path>
                                <path d="M6.404 12.768a2 2 0 1 1-2.829-2.829l1.768-1.767a2 2 0 1 1-2.828-2.829l2.828-2.828a2 2 0 1 1 2.829 2.828l1.767-1.768a2 2 0 1 1 2.829 2.829z"></path>
                            </svg>
                        </div>
                        <div class="amenity-content">
                            <h3>Fitness Center</h3>
                            <p>State-of-the-art fitness equipment available 24/7 with personal training services</p>
                        </div>
                    </div>
                    
                    <!-- Amenity 3 -->
                    <div class="amenity-item">
                        <div class="amenity-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M3 2v7c0 1.1.9 2 2 2h4a2 2 0 0 0 2-2V2"></path>
                                <path d="M7 2v20"></path>
                                <path d="M21 15V2a5 5 0 0 0-5 5v6c0 1.1.9 2 2 2h3Zm0 0v7"></path>
                            </svg>
                        </div>
                        <div class="amenity-content">
                            <h3>Fine Dining Restaurant</h3>
                            <p>Award-winning cuisine crafted by world-class chefs using locally sourced ingredients</p>
                        </div>
                    </div>
                    
                    <!-- Amenity 4 -->
                    <div class="amenity-item">
                        <div class="amenity-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M16 20V4a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"></path>
                                <rect width="20" height="14" x="2" y="6" rx="2"></rect>
                            </svg>
                        </div>
                        <div class="amenity-content">
                            <h3>Business Center</h3>
                            <p>Fully equipped meeting rooms and business facilities for corporate guests</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- reviews
    <section class="bg-light py-5">
    <div class="container">
        <div class="row justify-content-center text-center mb-5">
        <div class="col-lg-8">
            <h2 class="section-title">What Our Guests Say</h2>
            <p class="section-subtitle">Read authentic reviews from travelers who have experienced our hospitality. </p>
        </div>
        </div>

        <div class="row gy-4">
      
        <div class="col-12 col-md-4">
            <div class="card border-0 border-bottom border-primary shadow-sm h-100">
            <div class="card-body p-4">
                <figure>
                    <img 
                    src="https://plus.unsplash.com/premium_photo-1682144187125-b55e638cf286?fm=jpg&q=60&w=3000&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8bWVuJTIwcG9ydHJhaXR8ZW58MHx8MHx8fDA%3D" 
                    alt="Luna John"
                    class="img-fluid rounded-circle border border-3 shadow-sm mx-auto d-block"
                    style="width: 180px; height: 180px; object-fit: cover;"
                    >
                <figcaption>
                    <div class="mb-2 text-warning">
                    ★★★★★
                    </div>
                    <blockquote class="blockquote mb-3">
                    Booking was a breeze! The site was easy to use, and everything, from choosing dates to selecting guests all perfect!
                    </blockquote>
                    <h5 class="mb-1">Luna John</h5>
                </figcaption>
                </figure>
            </div>
            </div>
        </div>

    
        <div class="col-12 col-md-4">
            <div class="card border-0 border-bottom border-primary shadow-sm h-100">
            <div class="card-body p-4">
                <figure>
                    <img 
                    src="https://images.squarespace-cdn.com/content/v1/52540926e4b0d49865bee20d/1473520260750-LO9DJ4REDZYHU25BDX25/London+portrait+photographer" 
                    alt="Luna John"
                    class="img-fluid rounded-circle border border-3 shadow-sm mx-auto d-block"
                    style="width: 180px; height: 180px; object-fit: cover;"
                    >
                <figcaption>
                    <div class="mb-2 text-warning">
                    ★★★★★
                    </div>
                    <blockquote class="blockquote mb-3">
                    The rooms are beautifully designed with modern comforts, and the central location made exploring the city effortless.
                    </blockquote>
                    <h5 class="mb-1">May Smith</h5>
                </figcaption>
                </figure>
            </div>
            </div>
        </div>

      
        <div class="col-12 col-md-4">
            <div class="card border-0 border-bottom border-primary shadow-sm h-100">
            <div class="card-body p-4">
                <figure>
                    <img 
                    src="https://media.istockphoto.com/id/1919265357/photo/close-up-portrait-of-confident-businessman-standing-in-office.jpg?b=1&s=612x612&w=0&k=20&c=mS5RuBjy8j-pqFh_5iIabHVxgiIrbmwvetxRxAHk7GU=" 
                    alt="Luna John"
                    class="img-fluid rounded-circle border border-3 shadow-sm mx-auto d-block"
                    style="width: 180px; height: 180px; object-fit: cover;"
                    >
                <figcaption>
                    <div class="mb-2 text-warning">
                    ★★★★★
                    </div>
                    <blockquote class="blockquote mb-3">
                    The Haven exceeded all expectations! From the moment we arrived, the impeccable service and stunning accommodations!
                    </blockquote>
                    <h5 class="mb-1">Luke Reeves</h5>
                </figcaption>
                </figure>
            </div>
            </div>
        </div>
        </div>
    </div>
    </section>
     -->

    <section class="location-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Prime Location</h2>
                <p class="section-subtitle">Discover everything the city has to offer, right at your doorstep</p>
            </div>
            
            <div class="location-content">
                <!-- Map Card -->
                <div class="map-card">
                    <div class="map-content">
                        <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="map-icon">
                            <path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"></path>
                            <circle cx="12" cy="10" r="3"></circle>
                        </svg>
                        <p class="map-title">Interactive Map</p>
                        <p class="map-address">123 Downtown Avenue, Metropolitan City</p>
                    </div>
                </div>
                
                <!-- Nearby Attractions -->
                <div class="attractions">
                    <h3 class="attractions-title">Nearby Attractions</h3>
                    
                    <!-- Attraction 1 -->
                    <div class="attraction-item">
                        <div class="attraction-icon-container">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="attraction-icon">
                                <rect width="16" height="20" x="4" y="2" rx="2" ry="2"></rect>
                                <path d="M9 22v-4h6v4"></path>
                                <path d="M8 6h.01"></path>
                                <path d="M16 6h.01"></path>
                                <path d="M12 6h.01"></path>
                                <path d="M12 10h.01"></path>
                                <path d="M12 14h.01"></path>
                                <path d="M16 10h.01"></path>
                                <path d="M16 14h.01"></path>
                                <path d="M8 10h.01"></path>
                                <path d="M8 14h.01"></path>
                            </svg>
                        </div>
                        <div>
                            <h4 class="attraction-name">Financial District</h4>
                            <p class="attraction-distance">2 minutes walk</p>
                        </div>
                    </div>
                    
                    <!-- Attraction 2 -->
                    <div class="attraction-item">
                        <div class="attraction-icon-container">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="attraction-icon">
                                <path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4Z"></path>
                                <path d="M3 6h18"></path>
                                <path d="M16 10a4 4 0 0 1-8 0"></path>
                            </svg>
                        </div>
                        <div>
                            <h4 class="attraction-name">Shopping Center</h4>
                            <p class="attraction-distance">5 minutes walk</p>
                        </div>
                    </div>
                    
                    <!-- Attraction 3 -->
                    <div class="attraction-item">
                        <div class="attraction-icon-container">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="attraction-icon">
                                <rect width="16" height="16" x="4" y="3" rx="2"></rect>
                                <path d="M4 11h16"></path>
                                <path d="M12 3v8"></path>
                                <path d="m8 19-2 3"></path>
                                <path d="m18 22-2-3"></path>
                                <path d="M8 15h.01"></path>
                                <path d="M16 15h.01"></path>
                            </svg>
                        </div>
                        <div>
                            <h4 class="attraction-name">Metro Station</h4>
                            <p class="attraction-distance">3 minutes walk</p>
                        </div>
                    </div>
                    
                    <!-- Attraction 4 -->
                    <div class="attraction-item">
                        <div class="attraction-icon-container">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="attraction-icon">
                                <path d="M17.8 19.2 16 11l3.5-3.5C21 6 21.5 4 21 3c-1-.5-3 0-4.5 1.5L13 8 4.8 6.2c-.5-.1-.9.1-1.1.5l-.3.5c-.2.5-.1 1 .3 1.3L9 12l-2 3H4l-1 1 3 2 2 3 1-1v-3l3-2 3.5 5.3c.3.4.8.5 1.3.3l.5-.2c.4-.3.6-.7.5-1.2z"></path>
                            </svg>
                        </div>
                        <div>
                            <h4 class="attraction-name">International Airport</h4>
                            <p class="attraction-distance">25 minutes by car</p>
                        </div>
                    </div>
                </div>
            </div>
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

    <!-- Core theme JS-->
     <script src="{{ asset('js/scripts.js') }}"></script> 
@endsection