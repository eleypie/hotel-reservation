@extends('layouts.app') 

@section('content')

@section('title', 'Ameneties')

@include('nav')

    
    <!-- ameneties Section -->
    <section class="section mt-5" id="rooms">
        <div class="container-amenities mt-5">
            <div class="section-header">
                <h2 class="section-title">Amenities & Services</h2>
                <p class="section-subtitle">Experience the perfect blend of comfort and convenience with us </en> 
                </p>
            </div>
        </div>
    </section>
        <!-- Service 5 - Bootstrap Brain Component -->
    <section class="background-img py-3 py-md-5 py-xl-8">
    <div class="container overflow-hidden">
        <div class="row gy-4 gy-md-5 gy-lg-0 align-items-center">
        <div class="col-12 col-lg-5">
            <div class="row">
            <div class="col-12 col-xl-11">
                <h3 class="fs-6 mb-3 mb-xl-4 text-uppercase" style="color: #ff6600;">What We Do?</h3>
                <h2 class="display-5 mb-3 mb-xl-4">Enhancing Your Stay with Exceptional Comfort</h2>
                <p class="mb-3 mb-xl-4">At The Havens Resort, we offer a curated selection of amenities and services designed to make your stay seamless and unforgettable. From relaxing spa treatments and fine dining to concierge assistance and recreational activities, everything you need for a perfect escape is right here.</p>
            </div>
            </div>
        </div>
        <div class="col-12 col-lg-7 overflow-hidden">
            <div class="row gy-4">
            <div class="col-12 col-sm-6">
                <div class="flip-card">
                <div class="flip-card-inner">
                    <div class="flip-card-front card border-0 border-bottom border-primary shadow-sm">
                    <div class="card-body text-center p-4 p-xxl-5">
                    <svg xmlns="http://www.w3.org/2000/svg" width="56" height="56" fill="currentColor" class="bi bi-textarea-resize text-primary mb-4" viewBox="0 -960 960 960">
                    <path d="M80-120v-80q38 0 57-20t75-20 77 20 57 20 57-20 77-20 77 20 57 20 57-20 77-20 75 20 57 20v80q-59 0-77.5-20T748-160t-57 20-77 20-77-20-57-20-57 20-77 20-77-20-57-20-54.5 20T80-120m0-180v-80q38 0 57-20t75-20 77.5 20 56.5 20q36 0 57-20t77-20 77 20 57 20 57-20 77-20 75 20 57 20v80q-59 0-77.5-20T748-340t-55.5 20-78.5 20q-57 0-77.5-20T480-340q-38 0-56.5 20T346-300t-78.5-20-55.5-20-54.5 20T80-300m196-204 133-133-40-40q-33-33-70-48t-91-15v-100q75 0 124 16.5t96 63.5l256 256q-17 11-33 17.5t-37 6.5q-36 0-57-20t-77-20-77 20-57 20q-21 0-37-6.5T276-504m392-336q42 0 71 29.5t29 70.5q0 42-29 71t-71 29-71-29-29-71q0-41 29-70.5t71-29.5"/>
                    </svg>
                        <h4 class="mb-4">Infinity Pool & Spa</h4>
                        <p class="mb-4 text-secondary">Unwind in our rooftop infinity pool with relaxing views and indulge in full-service spa treatments designed for relaxation and rejuvenation.</p>
                    </div>
                    </div>
                    <div class="flip-card-back card border-0 border-bottom border-primary shadow-sm">
                    <div class="card-body p-0">
                        <img src="images/spa.png" alt="Spa Massage" class="img-fluid h-100 w-100" style="object-fit: cover;">
                    </div>
                    </div>
                </div>
                </div>
            </div>
            
            <div class="col-12 col-sm-6">
                <div class="flip-card">
                <div class="flip-card-inner">
                    <div class="flip-card-front card border-0 border-bottom border-primary shadow-sm">
                    <div class="card-body text-center p-4 p-xxl-5">
                    <svg xmlns="http://www.w3.org/2000/svg" width="56" height="56" fill="currentColor" class="bi bi-textarea-resize text-primary mb-4" viewBox="0 -960 960 960">
                    <path d="m826-585-56-56 30-31-128-128-31 30-57-57 30-31q23-23 57-22.5t57 23.5l129 129q23 23 23 56.5T857-615zM346-104q-23 23-56.5 23T233-104L104-233q-23-23-23-56.5t23-56.5l30-30 57 57-31 30 129 129 30-31 57 57zm397-336 57-57-303-303-57 57zM463-160l57-58-302-302-58 57zm-6-234 110-109-64-64-109 110zm63 290q-23 23-57 23t-57-23L104-406q-23-23-23-57t23-57l57-57q23-23 56.5-23t56.5 23l63 63 110-110-63-62q-23-23-23-57t23-57l57-57q23-23 56.5-23t56.5 23l303 303q23 23 23 56.5T857-441l-57 57q-23 23-57 23t-57-23l-62-63-110 110 63 63q23 23 23 56.5T577-161z"/>
                    </svg>
                        <h4 class="mb-4">Fitness Center</h4>
                        <p class="mb-4 text-secondary">Access our modern, fully equipped fitness center 24/7, with personal training services available to support your personal wellness goals.</p>
                    </div>
                    </div>
                    <div class="flip-card-back card border-0 border-bottom border-primary shadow-sm">
                    <div class="card-body p-0">
                        <img src="https://img.freepik.com/free-photo/women-running-treadmill_1262-419.jpg?semt=ais_hybrid&w=740" alt="Fitness Center" class="img-fluid h-100 w-100" style="object-fit: cover;">
                    </div>
                    </div>
                </div>
                </div>
            </div>
            
            <div class="col-12 col-sm-6">
                <div class="flip-card">
                <div class="flip-card-inner">
                    <div class="flip-card-front card border-0 border-bottom border-primary shadow-sm">
                    <div class="card-body text-center p-4 p-xxl-5">
                    <svg xmlns="http://www.w3.org/2000/svg" width="56" height="56" fill="currentColor" class="bi bi-textarea-resize text-primary mb-4" viewBox="0 -960 960 960">
                    <path d="M320-200h60v-270q26-8 43-28.5t17-49.5v-152q0-8-6-14t-14-6-14 6-6 14v100h-30v-100q0-8-6-14t-14-6-14 6-6 14v100h-30v-100q0-8-6-14t-14-6-14 6-6 14v152q0 29 17 49.5t43 28.5zm240 0h60v-254q33-16 51.5-51t18.5-82q0-57-28.5-95T590-720t-71.5 38-28.5 95q0 47 18.5 82t51.5 51zM160-80q-33 0-56.5-23.5T80-160v-640q0-33 23.5-56.5T160-880h640q33 0 56.5 23.5T880-800v640q0 33-23.5 56.5T800-80zm0-80h640v-640H160zm0 0v-640z"/>
                    </svg>
                        <h4 class="mb-4">Fine Dining Restaurant</h4>
                        <p class="mb-4 text-secondary">Savor award-winning cuisine prepared by world-class chefs, featuring locally sourced ingredients in an elegant dining setting.</p>
                    </div>
                    </div>
                    <div class="flip-card-back card border-0 border-bottom border-primary shadow-sm">
                    <div class="card-body p-0">
                        <img src="https://sgmagazine.com/sites/default/files/u143276/img_3189.jpg" alt="Fine Dining" class="img-fluid h-100 w-100" style="object-fit: cover;">
                    </div>
                    </div>
                </div>
                </div>
            </div>
            
            <div class="col-12 col-sm-6">
                <div class="flip-card">
                <div class="flip-card-inner">
                    <div class="flip-card-front card border-0 border-bottom border-primary shadow-sm">
                    <div class="card-body text-center p-4 p-xxl-5">
                    <svg xmlns="http://www.w3.org/2000/svg" width="56" height="56" fill="currentColor" class="bi bi-textarea-resize text-primary mb-4" viewBox="0 -960 960 960">
                    <path d="M160-120q-33 0-56.5-23.5T80-200v-440q0-33 23.5-56.5T160-720h160v-80q0-33 23.5-56.5T400-880h160q33 0 56.5 23.5T640-800v80h160q33 0 56.5 23.5T880-640v440q0 33-23.5 56.5T800-120zm0-80h640v-440H160zm240-520h160v-80H400zM160-200v-440z"/>
                    </svg>
                        <h4 class="mb-4">Business Center</h4>
                        <p class="mb-4 text-secondary">Stay productive with our fully equipped business center, offering private meeting rooms, high-speed internet, and professional services.</p>
                    </div>
                    </div>
                    <div class="flip-card-back card border-0 border-bottom border-primary shadow-sm">
                    <div class="card-body p-0">
                        <img src="https://blog.industriousoffice.com/wp-content/uploads/2024/08/Blog-meetings-1-1024x683.jpg" alt="Business Center" class="img-fluid h-100 w-100" style="object-fit: cover;">
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    </section>

<section class="newsletter-section">
    <div class="newsletter-container">
        <h2 class="newsletter-title">Experience The Haven</h2>
        <p class="newsletter-quote">
            “Where exceptional service meets elegant comfort — your perfect stay begins here.”
        </p>
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
@endsection