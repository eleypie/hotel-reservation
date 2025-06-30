<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Family Suite | TheHaven</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Experience luxury in our Family Suite with premium amenities and stunning views">

    <!-- Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <!-- Custom CSS -->
        <link href="{{ asset('css/booking-form.css') }}" rel="stylesheet" />
</head>

<body>
    <!-- Header Section -->
    @include('nav')
        <div class="container-fluid">
        <div class="booking-container d-lg-flex">
            <!-- Image Container (Visible on all screens) -->
            <div class="col-lg-6">
                <div class="image-container">
                    <img src="https://res.cloudinary.com/lastminute/image/upload/q_auto/v1746440041/Genel_Goruntu_5_x1tmz0.jpg" 
                        alt="Luxury Suite Room">

                        
                    <div class="image-overlay">
                        <div class="room-header">
                        <h2 class="room-title">Family Suite</h2>
                        
                        <p class="room-subtitle">Premium Ocean View • 45 sqm</p>
                        <div class="mt-3">
                            <span class="badge bg-light text-dark me-2"><i class="fas fa-wifi amenity-icon"></i> Free WiFi</span>
                            <span class="badge bg-light text-dark me-2"><i class="fas fa-tv amenity-icon"></i> Smart TV</span>
                            <span class="badge bg-light text-dark"><i class="fa fa-thermometer-0 amenity-icon"></i> Mini Fridge</span>
                                                        <span class="badge bg-light text-dark me-2"><i class="fas fa-bed amenity-icon"></i>1 Queen Bed + 2 Single Beds</span>
                            <span class="badge bg-light text-dark me-2"><i class="fas fa-snowflake amenity-icon"></i> Air Conditioning</span>
                            <span class="badge bg-light text-dark"><i class="fa fa-spoon amenity-icon"></i> Dining Area</span>
                        </div>
                        </div>


                    </div>
                   
                </div>
            </div>
            
            <!-- Booking Form -->
            @include('components.booking-form', ['roomTypeId' => 4, 'ratePerNight' => 6800])
            
        </div>
    </div>


            <!-- Payment Receipt Section (Initially Hidden) -->
            @include('modal', ['room_type' => 'Family'])
        </div>
        </div>
    </div>
    </div>
    </div>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    @if(session('show_modal') && session('modal_data'))
    <script>
        window.modalData = {!! json_encode(session('modal_data')) !!};
    </script>
    @endif
</body>
</html>