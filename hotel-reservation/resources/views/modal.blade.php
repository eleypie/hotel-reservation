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
                    
                    <div 
                        id="bookingData" 
                        data-room-type="{{ $room_type }}" >
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
                            <span class="fw-bold" id="total_price">₱716.55</span>
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
                
                <!-- model after clicking the two button -->
                <div class="modal-footer justify-content-center">
                <a href="#" id="downloadReceiptBtn" class="btn btn-primary me-2" target="_blank">
                    <i class="fas fa-download me-1"></i> Download Receipt
                </a>

                <a href="#" id="emailReceiptBtn" class="btn btn-success">
                    <i class="fas fa-envelope me-1"></i> Email Receipt
                </a>
                </div>
                </div>
            </div> 


                <div class="modal fade" id="receiptActionModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-sm modal-dialog-centered">
                    <div class="modal-content text-center">
                    <div class="modal-header bg-success text-white justify-content-center">
                        <h5 class="modal-title" id="receiptActionModalLabel">Success</h5>
                    </div>
                    <div class="modal-body">
                        <p id="receiptActionMessage">Action completed successfully.</p>
                        <a href="{{ route('home') }}" class="btn btn-primary mt-2" id="modalReturnHome">
                        Return to Home
                        </a>
                    </div>
                    </div>
                </div>
                </div>
            </div> 