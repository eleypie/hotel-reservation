<div class="col-lg-6">
                <div class="booking-form">
                    <h4 class="form-title">Complete Your Booking</h4>
                    <p class="form-subtitle">Secure your luxury stay in just a few steps</p>
                
                    <form id="booking-form" action="{{ route('booking.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="room_type" value="{{ $roomType }}">
                        <div id="roomData" data-rate="{{ $ratePerNight }}" data-room-type="{{ $roomType }}"></div>
                        <div class="form-group">
                            <label for="daterange">Check-in & Check-out</label>
                            <i class="far fa-calendar-alt"></i>
                            <input type="text" name="daterange" value="01/01/2018 - 01/15/2018" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input name="email" type="email" class="form-control" id="email" value="guest@example.com">
                        </div>
                        
                        <div class="form-group">
                            <label for="guests">Guests</label>
                            <select name="guest_count" class="form-control" id="guests" >
                                <option value="1 Adult">1 Adult</option>
                                <option value="2 Adult" selected>2 Adults</option>
                                <option value="2 Adults, 1 Child">2 Adults, 1 Child</option>
                                <option value="2 Adults, 2 Children">2 Adults, 2 Children</option>
                                <option value="3 Adults">3 Adults</option>
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
                                        <input type="tel" class="form-control" placeholder="9XX XXX XXXX" pattern="[0-9]{10}" name="gcash_phone" required>
                                    </div>
                                    <small class="text-muted">We'll send payment confirmation to this number</small>
                                </div>

                                <div class="form-group">
                                    <label>GCash Reference Number</label>
                                    <input type="text" class="form-control" placeholder="Enter transaction reference"  name="gcash_reference" required>
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
                            <textarea class="form-control" rows="3" placeholder="Any special requirements? (e.g., early check-in, extra pillows)" name="note"></textarea>
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
                        
                        @guest
                            <a href="{{ route('login') }}" class="book-btn btn btn-primary w-100">
                                <i class="fas fa-lock me-2"></i> Login to Book
                            </a>
                        @else
                            <button type="submit" class="book-btn btn btn-primary w-100">
                                <i class="fas fa-lock me-2"></i> Complete Secure Booking
                            </button>
                        @endguest
                        
                        <p class="text-center mt-3 text-muted small">
                            <i class="fas fa-shield-alt me-2"></i> Your payment is securely processed
                        </p>
                    </form>
                </div>
            </div>