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
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <!-- Custom CSS -->
    <link href="{{ asset('css/contact.css') }}" rel="stylesheet" />


    <!-- Custom CSS -->
    <link href="{{ asset('css/booking-form.css') }}" rel="stylesheet" />
</head>
<body>
            <form action="" method="post" id="bookingForm">
                <div class="price-section mt-4">
                    <button type="button" class="book-btn" id="submitBooking">
                    <i class="fas fa-lock me-2"></i> Complete Secure Booking
                    </button>
                </div>
            </form>

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


    
    <!-- Add jQuery (required for some Bootstrap components) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script>
document.addEventListener('DOMContentLoaded', function() {
  // Get references to elements
  const bookingForm = document.getElementById('bookingForm');
  const submitBtn = document.getElementById('submitBooking');
  const receiptModal = new bootstrap.Modal(document.getElementById('paymentReceiptModal'));
  
  // When booking button is clicked
  submitBtn.addEventListener('click', function() {
    // Validate form first
    if (bookingForm.checkValidity()) {
      // Get form data
      const formData = new FormData(bookingForm);
      
      // Update modal with dynamic data
      const now = new Date();
      document.getElementById('modal-date-time').textContent = 
        now.toLocaleString('en-US', {
          month: 'long', 
          day: 'numeric', 
          year: 'numeric',
          hour: '2-digit',
          minute: '2-digit'
        });
      
      // Generate random transaction ID
      document.getElementById('modal-transaction-id').textContent = 
        'GC' + Math.floor(Math.random() * 10000000000);
      
      // You can update other modal fields with form data here
      // For example:
      // document.querySelector('.booking-details span:nth-child(2)').textContent = 
      //   formData.get('room_type');
      
      // Show the receipt modal
      receiptModal.show();
      
      // Optional: Submit form via AJAX
      /*
      fetch('/process-booking', {
        method: 'POST',
        body: formData
      })
      .then(response => response.json())
      .then(data => {
        // Handle server response if needed
      });
      */
    } else {
      // Show validation errors
      bookingForm.reportValidity();
    }
  });
});
</script>
</body>
</html>