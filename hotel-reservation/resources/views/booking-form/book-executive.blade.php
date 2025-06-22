<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Executive Suite | TheHaven</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Experience luxury in our Executive Suite with premium amenities and stunning views">

    <!-- Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css">

    <!-- Custom CSS -->
        <link href="{{ asset('css/booking-form.css') }}" rel="stylesheet" />
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
        <div class="container-fluid">
        <div class="booking-container d-lg-flex">
            <!-- Image Container (Visible on all screens) -->
            <div class="col-lg-6">
                <div class="image-container">
                    <img src="https://res.cloudinary.com/lastminute/image/upload/q_auto/v1746440041/Genel_Goruntu_5_x1tmz0.jpg" 
                        alt="Luxury Suite Room">

                        
                    <div class="image-overlay">
                        <div class="room-header">
                        <h2 class="room-title">Executive Suite</h2>
                        
                        <p class="room-subtitle">Premium Ocean View • 45 sqm</p>
                        <div class="mt-3">
                            <span class="badge bg-light text-dark me-2"><i class="fas fa-wifi amenity-icon"></i> Free WiFi</span>
                            <span class="badge bg-light text-dark me-2"><i class="fas fa-tv amenity-icon"></i> Smart TV</span>
                            <span class="badge bg-light text-dark"><i class="fa fa-laptop amenity-icon"></i> Work Desk </span>
                                                        <span class="badge bg-light text-dark me-2"><i class="fas fa-bed amenity-icon"></i> King Bed</span>
                            <span class="badge bg-light text-dark me-2"><i class="fas fa-snowflake amenity-icon"></i> Air Conditioning</span>
                            <span class="badge bg-light text-dark"><i class="fas fa-couch amenity-icon"></i> Living Area </span>
                        </div>
                        </div>


                    </div>
                   
                </div>
            </div>
            
            <!-- Booking Form -->
            <div class="col-lg-6">
                <div class="booking-form">
                    <h4 class="form-title">Complete Your Booking</h4>
                    <p class="form-subtitle">Secure your luxury stay in just a few steps</p>
                
                    <form>
                        <div class="form-group">
                            <label for="daterange">Check-in & Check-out</label>
                            <i class="far fa-calendar-alt"></i>
                            <input type="text" class="form-control daterange-input" id="daterange" placeholder="Select dates">
                        </div>

                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email" class="form-control" id="email" value="guest@example.com">
                        </div>
                        
                        <div class="form-group">
                            <label for="guests">Guests</label>
                            <select class="form-control" id="guests">
                                <option>1 Adult</option>
                                <option selected>2 Adults</option>
                                <option>2 Adults, 1 Child</option>
                                <option>2 Adults, 2 Children</option>
                                <option>3 Adults</option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label>Payment Method</label>
                            <div class="payment-method-select">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="paymentMethod" id="gcash" checked>
                                    <label class="form-check-label" for="gcash">
                                        <img src="https://cdn.brandfetch.io/gcash.com/fallback/lettermark/theme/dark/h/256/w/256/icon?c=1bfwsmEH20zzEfSNTed" 
                                            alt="GCash" 
                                            style="height: 24px; margin-left: 10px;">
                                        <span class="ms-2">GCash</span>
                                    </label>
                                </div>
                            </div>

                            <div class="gcash-payment mt-3">
                                <div class="alert alert-info d-flex align-items-center">
                                    <i class="fas fa-info-circle me-2"></i>
                                    <div>Please complete payment via GCash using the QR code below</div>
                                </div>
                                
                                <div class="text-center my-3">
                                    <img src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data=GCashPayment123456" 
                                        alt="GCash QR Code" 
                                        class="img-fluid border p-2 bg-white"
                                        style="max-width: 200px;">
                                    <p class="small text-muted mt-2">Scan to pay via GCash</p>
                                </div>

                                <div class="form-group">
                                    <label>GCash Mobile Number</label>
                                    <div class="input-group">
                                        <span class="input-group-text">+63</span>
                                        <input type="tel" class="form-control" placeholder="9XX XXX XXXX" pattern="[0-9]{10}">
                                    </div>
                                    <small class="text-muted">We'll send payment confirmation to this number</small>
                                </div>

                                <div class="form-group">
                                    <label>GCash Reference Number</label>
                                    <input type="text" class="form-control" placeholder="Enter transaction reference">
                                    <small class="text-muted">Found in your GCash transaction history</small>
                                </div>

                                <div class="alert alert-warning d-flex align-items-center">
                                    <i class="fas fa-exclamation-triangle me-2"></i>
                                    <div>Your booking will be confirmed only after payment is verified</div>
                                </div>
                            </div>
                        </div>
                                            
                        <div class="form-group">
                            <label>Special Requests</label>
                            <textarea class="form-control" rows="3" placeholder="Any special requirements? (e.g., early check-in, extra pillows)"></textarea>
                        </div>
                        
                        <div class="price-summary">
                            <div class="price-row">
                                <span>Room (3 nights)</span>
                                <span>₱16,500.00</span>
                            </div>
                            <div class="price-row">
                                <span>Taxes & Fees</span>
                                <span>₱2,475.00</span>
                            </div>
                            <div class="price-row">
                                <span>Service Charge</span>
                                <span>₱1,200.00</span>
                            </div>
                            <div class="price-row total-row">
                                <span>Total Amount</span>
                                <span>₱20,175.00</span>
                            </div>
                        </div>
                        
                        <button type="submit" class="book-btn">
                            <i class="fas fa-lock me-2"></i> Complete Secure Booking
                        </button>
                        
                        <p class="text-center mt-3 text-muted small">
                            <i class="fas fa-shield-alt me-2"></i> Your payment is securely processed
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>


            <!-- Payment Receipt Section (Initially Hidden) -->
            <div class="modal fade" id="paymentReceiptModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                <div class="modal-header  text-white">
                    <div class="d-flex align-items-center">
                    <img src="https://cdn.brandfetch.io/gcash.com/fallback/lettermark/theme/dark/h/256/w/256/icon?c=1bfwsmEH20zzEfSNTed"
                        alt="GCash" style="height: 30px; margin-right: 15px;">
                    <h5 class="modal-title">Payment Confirmation</h5>
                    </div>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                
                <div class="modal-body">
                    <div class="alert alert-success d-flex align-items-center">
                    <i class="fas fa-check-circle me-2 fs-4"></i>
                    <div>
                        <h6 class="mb-0">Payment Successful!</h6>
                        <small>Your booking is now confirmed</small>
                    </div>
                    </div>
                    
                    <div class="row">
                    <div class="col-md-6">
                        <div class="receipt-details">
                        <h6 class="border-bottom pb-2">Transaction Details</h6>
                        <div class="d-flex justify-content-between py-2">
                            <span class="text-muted">Reference No:</span>
                            <span class="fw-bold" id="modal-transaction-id">GC9876543210</span>
                        </div>
                        <div class="d-flex justify-content-between py-2">
                            <span class="text-muted">Date & Time:</span>
                            <span id="modal-date-time">June 22, 2023 15:45</span>
                        </div>
                        <div class="d-flex justify-content-between py-2">
                            <span class="text-muted">Payment Method:</span>
                            <span>GCash Wallet</span>
                        </div>
                        <div class="d-flex justify-content-between py-2">
                            <span class="text-muted">Amount Paid:</span>
                            <span class="fw-bold">₱716.55</span>
                        </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="booking-details">
                        <h6 class="border-bottom pb-2">Booking Information</h6>
                        <div class="d-flex justify-content-between py-2">
                            <span class="text-muted">Booking ID:</span>
                            <span class="fw-bold">BOOK20230622145</span>
                        </div>
                        <div class="d-flex justify-content-between py-2">
                            <span class="text-muted">Room Type:</span>
                            <span>Luxury Suite</span>
                        </div>
                        <div class="d-flex justify-content-between py-2">
                            <span class="text-muted">Check-in:</span>
                            <span>June 25, 2023</span>
                        </div>
                        <div class="d-flex justify-content-between py-2">
                            <span class="text-muted">Check-out:</span>
                            <span>June 28, 2023</span>
                        </div>
                        </div>
                    </div>
                    </div>
                    
                    <div class="verification-section mt-4 p-3 bg-light rounded">
                    <div class="d-flex align-items-center mb-2">
                        <i class="fas fa-shield-alt text-success me-2"></i>
                        <h6 class="mb-0">Payment Verified</h6>
                    </div>
                    <div class="row small">
                        <div class="col-md-6">
                        <div class="d-flex justify-content-between py-1">
                            <span class="text-muted">GCash Reference:</span>
                            <span>GC9876543210</span>
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="d-flex justify-content-between py-1">
                            <span class="text-muted">Mobile Number:</span>
                            <span>+63 912 345 6789</span>
                        </div>
                        </div>
                    </div>
                    </div>
                    
                    <div class="qr-code-section text-center mt-4">
                    <p class="mb-2"><small class="text-muted">Present this QR code at check-in</small></p>
                    <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=BOOK20230622145" 
                        alt="Booking QR Code" 
                        class="img-thumbnail border-primary"
                        style="border: 2px dashed #7700ff">
                    </div>
                </div>
                
                <div class="modal-footer justify-content-center">
                    <button class="btn btn-primary me-2">
                    <i class="fas fa-download me-1"></i> Download Receipt
                    </button>
                    <button class="btn btn-success">
                    <i class="fas fa-envelope me-1"></i> Email Receipt
                    </button>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>
    </div>

    <script type="text/javascript">
    // Initialize date range picker
    $(document).ready(function() {
        $('.daterange-input').daterangepicker({
            opens: 'left',
            autoUpdateInput: false,
            locale: {
                cancelLabel: 'Clear',
                format: 'MM/DD/YYYY'
            }
        });
        
        $('.daterange-input').on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
        });
        
        $('.daterange-input').on('cancel.daterangepicker', function(ev, picker) {
            $(this).val('');
        });
    });

    // show receipt when form is submitted 
        document.querySelector('form').addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Update modal with current data
        const now = new Date();
        document.getElementById('modal-date-time').textContent = now.toLocaleString('en-US', {
            month: 'long', 
            day: 'numeric', 
            year: 'numeric',
            hour: '2-digit',
            minute: '2-digit'
        });
        
        // Generate random transaction ID
        const transId = 'GC' + Math.floor(Math.random() * 10000000000);
        document.getElementById('modal-transaction-id').textContent = transId;
        
        // Show modal
        var receiptModal = new bootstrap.Modal(document.getElementById('paymentReceiptModal'));
        receiptModal.show();
        
        // You can add AJAX form submission here if needed
    });
</script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>