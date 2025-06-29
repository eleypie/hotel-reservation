@extends('layouts.admin-app')

@section('title', 'Bookings')

@push('scripts')
<script>
function openModal(modalId) {
    document.getElementById(modalId).classList.add('show');
}

function closeModal(modalId) {
    document.getElementById(modalId).classList.remove('show');
}

function viewBooking(bookingId) {
    alert('View booking details for ID: ' + bookingId);
    // Here you would typically redirect to a booking details page
    // window.location.href = '/admin/bookings/' + bookingId;
}

function editBooking(bookingId) {
    alert('Edit booking for ID: ' + bookingId);
    // Here you would typically open an edit modal or redirect to edit page
    // openModal('editBookingModal');
}

function deleteBooking(bookingId) {
    if (confirm('Are you sure you want to delete booking ID: ' + bookingId + '?')) {
        alert('Delete booking for ID: ' + bookingId);
        // Here you would typically send a delete request
        // or submit a form to delete the booking
    }
}

// Close modal when clicking outside
document.addEventListener('click', function(e) {
    if (e.target.classList.contains('modal')) {
        e.target.classList.remove('show');
    }
});
</script>
@endpush

@section('content')
<main class="main-content">
    <div class="page-header">
        <h1>Booking Management</h1>
        <p>View and manage all hotel bookings.</p>
    </div>

    <div class="content-section">
        <div class="section-header">
            <h2 class="section-title">All Bookings</h2>
            <button class="btn btn-primary" onclick="openModal('addBookingModal')">
                    Manual Booking
            </button>
        </div>
        <table class="data-table">
            <thead>
                <tr>
                    <th>Booking ID</th>
                    <th>Guest Name</th>
                    
                    <th>Room No</th>
                    <th>Check In</th>
                    <th>Check Out</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @if(isset($bookings) && count($bookings) > 0)
                    @foreach($bookings as $booking)
                        <tr>
                            <td>{{ $booking->booking_id }}</td>
                            <td>{{ $booking->user->first_name}} {{$booking->user->last_name}}</td>
                            <td>{{ $booking->email_confirmation }}</td>
                            <td>{{ $booking->room_id}}</td>
                            <td>{{ $booking->check_in_date }}</td>
                            <td>{{ $booking->check_out_date }}</td>
                            <td><span class="status-badge status-{{ strtolower($booking->status) }}">{{ $booking->status}}</span></td>
                            <td>
                                <div class="action-buttons">
                                    <button class="btn btn-info" onclick="viewBooking({{ $booking->booking_id }})">View</button>
                                    <button class="btn btn-warning" onclick="editBooking({{ $booking->booking_id }})">Edit</button>
                                    <button class="btn btn-danger" onclick="deleteBooking({{ $booking->booking_id }})">Delete</button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @else
                    {{-- Sample data when no bookings exist --}}
                    <tr>
                        <td>BK001</td>
                        <td>John Smith</td>
                       
                        <td>101</td>
                        <td>2024-07-01</td>
                        <td>2024-07-05</td>
                        <td><span class="status-badge status-confirmed">Confirmed</span></td>
                        <td>
                            <div class="action-buttons">
                                <button class="btn btn-info" onclick="viewBooking('BK001')">View</button>
                                <button class="btn btn-warning" onclick="editBooking('BK001')">Edit</button>
                                <button class="btn btn-danger" onclick="deleteBooking('BK001')">Delete</button>
                            </div>
                        </td>
                    </tr>
                    
                @endif
            </tbody>
        </table>
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert" style="z-index: 100">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert" style="z-index: 100">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
    </div>

    <div id="addBookingModal" class="modal">
    <div class="modal-content modal-lg">
        <div class="modal-header">
            <h2>Manual Booking Entry</h2>
            <button class="close-btn" onclick="closeModal('addBookingModal')">&times;</button>
        </div>
        <div class="modal-body scrollable-content">
            <form id="addBookingForm" method="POST" action="{{ route('manual-booking') }}">
                @csrf
                <div class="booking-form-container">
                    
                    <!-- Guest Information Section -->
                    <div class="form-section">
                        <h3 class="section-title">Guest Information</h3>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="firstName">First Name <span class="required">*</span></label>
                                <input type="text" id="firstName" name="first_name" required>
                                <div class="error-message" id="firstNameError"></div>
                            </div>
                            <div class="form-group">
                                <label for="lastName">Last Name <span class="required">*</span></label>
                                <input type="text" id="lastName" name="last_name" required>
                                <div class="error-message" id="lastNameError"></div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="email">Email Address <span class="required">*</span></label>
                                <input type="email" id="email" name="email_confirmation" required>
                                <div class="error-message" id="emailError"></div>
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone Number <span class="required">*</span></label>
                                <input type="tel" id="phone" name="phone" required>
                                <div class="error-message" id="phoneError"></div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="guestCount">Number of Guests <span class="required">*</span></label>
                                <input type="number" id="guestCount" name="guest_count" min="1" max="10" required>
                                <div class="error-message" id="guestCountError"></div>
                            </div>
                            <div class="form-group">
                                <label for="idNumber">ID Number (Optional)</label>
                                <input type="text" id="idNumber" name="id_number">
                            </div>
                        </div>
                    </div>

                    <!-- Room & Dates Section -->
                    <div class="form-section">
                        <h3 class="section-title">Room & Booking Details</h3>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="roomType">Room Type <span class="required">*</span></label>
                                <select id="roomType" name="room_type" required onchange="calculateTotal()">
                                    <option value="" disabled selected>Select Room Type</option>
                                    @if(isset($roomTypes))
                                        @foreach($roomTypes as $roomType)
                                            <option value="{{ $roomType->room_type }}" data-price="{{ $roomType->price }}">
                                                {{ $roomType->room_name }} - ${{ $roomType->price }}/night
                                            </option>
                                        @endforeach
                                    @else
                                        <option value="standard" data-price="150">Standard Room - $150/night</option>
                                        <option value="deluxe" data-price="200">Deluxe Suite - $200/night</option>
                                        <option value="executive" data-price="300">Executive Suite - $300/night</option>
                                        <option value="presidential" data-price="500">Presidential Suite - $500/night</option>
                                    @endif
                                </select>
                                <div class="error-message" id="roomTypeError"></div>
                            </div>
                            <div class="form-group">
                                <label for="roomNumber">Preferred Room Number (Optional)</label>
                                <input type="text" id="roomNumber" name="room_number" placeholder="e.g., 101">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="checkInDate">Check-in Date <span class="required">*</span></label>
                                <input type="date" id="checkInDate" name="check_in_date" required onchange="calculateTotal()">
                                <div class="error-message" id="checkInError"></div>
                            </div>
                            <div class="form-group">
                                <label for="checkOutDate">Check-out Date <span class="required">*</span></label>
                                <input type="date" id="checkOutDate" name="check_out_date" required onchange="calculateTotal()">
                                <div class="error-message" id="checkOutError"></div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="nights">Number of Nights</label>
                                <input type="number" id="nights" name="nights" readonly>
                            </div>
                            <div class="form-group">
                                <label for="totalAmount">Total Amount ($) <span class="required">*</span></label>
                                <input type="number" id="totalAmount" name="total_price" step="0.01" readonly required>
                            </div>
                        </div>
                    </div>

                    <!-- Payment Information Section -->
                    <div class="form-section">
                        <h3 class="section-title">Payment Information</h3>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="paymentMethod">Payment Method <span class="required">*</span></label>
                                <select id="paymentMethod" name="payment_method" required>
                                    <option value="" disabled selected>Select Payment Method</option>
                                    <option value="cash">Cash</option>
                                    <option value="credit_card">Credit Card</option>
                                    <option value="debit_card">Debit Card</option>
                                    <option value="gcash">GCash</option>
                                    <option value="paymaya">PayMaya</option>
                                    <option value="bank_transfer">Bank Transfer</option>
                                </select>
                                <div class="error-message" id="paymentMethodError"></div>
                            </div>
                            <div class="form-group">
                                <label for="paymentStatus">Payment Status</label>
                                <select id="paymentStatus" name="payment_status">
                                    <option value="pending">Pending</option>
                                    <option value="partial">Partial Payment</option>
                                    <option value="paid">Fully Paid</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="transactionNo">Transaction Number (Optional)</label>
                                <input type="text" id="transactionNo" name="transaction_no" placeholder="e.g., TXN123456789">
                            </div>
                            <div class="form-group">
                                <label for="amountPaid">Amount Paid ($)</label>
                                <input type="number" id="amountPaid" name="amount_paid" step="0.01" placeholder="0.00">
                            </div>
                        </div>
                    </div>

                    <!-- Additional Information Section -->
                    <div class="form-section">
                        <h3 class="section-title">Additional Information</h3>
                        <div class="form-row">
                            <div class="form-group full-width">
                                <label for="specialRequests">Special Requests / Notes</label>
                                <textarea id="specialRequests" name="special_requests" rows="4" placeholder="Enter any special requests or notes..."></textarea>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="bookingSource">Booking Source</label>
                                <select id="bookingSource" name="booking_source">
                                    <option value="walk_in">Walk-in</option>
                                    <option value="phone">Phone</option>
                                    <option value="email">Email</option>
                                    <option value="website">Website</option>
                                    <option value="third_party">Third Party</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="bookingStatus">Booking Status</label>
                                <select id="bookingStatus" name="status">
                                    <option value="confirmed">Confirmed</option>
                                    <option value="pending">Pending</option>
                                    <option value="cancelled">Cancelled</option>
                                </select>
                            </div>
                        </div>
                    </div>

                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" onclick="closeModal('addBookingModal')">Cancel</button>
            <button type="button" class="btn btn-primary" onclick="submitBookingForm()">Create Booking</button>
        </div>
    </div>
</div>


    <div id="viewBookingModal" class="modal">
    <div class="modal-content modal-lg">
        <div class="modal-header">
            <h2>Booking Details</h2>
            <button class="close-btn" onclick="closeModal('viewBookingModal')">&times;</button>
        </div>
        <div class="modal-body">
            <div class="booking-details-container">
                <!-- Booking Header -->
                <div class="booking-header">
                    <div class="booking-id-section">
                        <h3>Booking ID: <span id="viewBookingId">BK001</span></h3>
                        <span id="viewBookingStatus" class="status-badge status-confirmed">CHECKED-IN</span>
                    </div>
                </div>

                <!-- Details Grid -->
                <div class="details-grid">
                    <!-- Guest Details -->
                    <div class="detail-section">
                        <h4 class="section-title">Guest Details</h4>
                        <div class="detail-row">
                            <div class="detail-item">
                                <label>First Name</label>
                                <span id="viewFirstName">John</span>
                            </div>
                            <div class="detail-item">
                                <label>Last Name</label>
                                <span id="viewLastName">Smith</span>
                            </div>
                        </div>
                        <div class="detail-row">
                            <div class="detail-item">
                                <label>Email</label>
                                <span id="viewEmail">john.smith@email.com</span>
                            </div>
                            <div class="detail-item">
                                <label>Phone Number</label>
                                <span id="viewPhone">+1 234 567 8900</span>
                            </div>
                        </div>
                        <div class="detail-row">
                            <div class="detail-item">
                                <label>Number of Guests</label>
                                <span id="viewGuestCount">2</span>
                            </div>
                        </div>
                    </div>

                    <!-- Room Details -->
                    <div class="detail-section">
                        <h4 class="section-title">Room Details</h4>
                        <div class="detail-row">
                            <div class="detail-item">
                                <label>Room No.</label>
                                <span id="viewRoomNo">101</span>
                            </div>
                            <div class="detail-item">
                                <label>Room Type</label>
                                <span id="viewRoomType">Deluxe</span>
                            </div>
                        </div>
                        <div class="detail-row">
                            <div class="detail-item">
                                <label>Check-in Date</label>
                                <span id="viewCheckIn">2024-07-01</span>
                            </div>
                            <div class="detail-item">
                                <label>Check-out Date</label>
                                <span id="viewCheckOut">2024-07-05</span>
                            </div>
                        </div>
                    </div>

                    <!-- Payment Details -->
                    <div class="detail-section">
                        <h4 class="section-title">Payment Details</h4>
                        <div class="detail-row">
                            <div class="detail-item">
                                <label>Payment Method</label>
                                <span id="viewPaymentMethod">GCash</span>
                            </div>
                            <div class="detail-item">
                                <label>Amount</label>
                                <span id="viewAmount">$800.00</span>
                            </div>
                        </div>
                        <div class="detail-row">
                            <div class="detail-item">
                                <label>Transaction No.</label>
                                <span id="viewTransactionNo">TXN123456789</span>
                            </div>
                        </div>
                    </div>

                    <!-- Additional Information -->
                    <div class="detail-section full-width">
                        <h4 class="section-title">Additional Information</h4>
                        <div class="detail-row">
                            <div class="detail-item full-width">
                                <label>Notes</label>
                                <div id="viewNotes" class="notes-content">
                                    Special requests: Late check-in, extra towels
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-secondary" onclick="closeModal('viewBookingModal')">Close</button>
            <button class="btn btn-warning" onclick="editBookingFromView()">Edit Booking</button>
        </div>
    </div>
</div>

</main>


    <!-- View Booking Modal -->
  
<!-- Add this modal after your existing addBookingModal -->
<div id="viewBookingModal" class="modal">
    <div class="modal-content modal-lg">
        <div class="modal-header">
            <h2>Booking Details</h2>
            <button class="close-btn" onclick="closeModal('viewBookingModal')">&times;</button>
        </div>
        <div class="modal-body scrollable-content">
            <div class="booking-details-container">
                <!-- Booking Header -->
                <div class="booking-header">
                    <div class="booking-id-section">
                        <h3>Booking ID: <span id="viewBookingId">BK001</span></h3>
                        <span id="viewBookingStatus" class="status-badge status-confirmed">CHECKED-IN</span>
                    </div>
                </div>

                <!-- Details Grid -->
                <div class="details-grid">
                    <!-- Guest Details -->
                    <div class="detail-section">
                        <h4 class="section-title">Guest Details</h4>
                        <div class="detail-row">
                            <div class="detail-item">
                                <label>First Name</label>
                                <span id="viewFirstName">John</span>
                            </div>
                            <div class="detail-item">
                                <label>Last Name</label>
                                <span id="viewLastName">Smith</span>
                            </div>
                        </div>
                        <div class="detail-row">
                            <div class="detail-item">
                                <label>Email</label>
                                <span id="viewEmail">john.smith@email.com</span>
                            </div>
                            <div class="detail-item">
                                <label>Phone Number</label>
                                <span id="viewPhone">+1 234 567 8900</span>
                            </div>
                        </div>
                        <div class="detail-row">
                            <div class="detail-item">
                                <label>Number of Guests</label>
                                <span id="viewGuestCount">2</span>
                            </div>
                        </div>
                    </div>

                    <!-- Room Details -->
                    <div class="detail-section">
                        <h4 class="section-title">Room Details</h4>
                        <div class="detail-row">
                            <div class="detail-item">
                                <label>Room No.</label>
                                <span id="viewRoomNo">101</span>
                            </div>
                            <div class="detail-item">
                                <label>Room Type</label>
                                <span id="viewRoomType">Deluxe</span>
                            </div>
                        </div>
                        <div class="detail-row">
                            <div class="detail-item">
                                <label>Check-in Date</label>
                                <span id="viewCheckIn">2024-07-01</span>
                            </div>
                            <div class="detail-item">
                                <label>Check-out Date</label>
                                <span id="viewCheckOut">2024-07-05</span>
                            </div>
                        </div>
                    </div>

                    <!-- Payment Details -->
                    <div class="detail-section">
                        <h4 class="section-title">Payment Details</h4>
                        <div class="detail-row">
                            <div class="detail-item">
                                <label>Payment Method</label>
                                <span id="viewPaymentMethod">GCash</span>
                            </div>
                            <div class="detail-item">
                                <label>Amount</label>
                                <span id="viewAmount">$800.00</span>
                            </div>
                        </div>
                        <div class="detail-row">
                            <div class="detail-item">
                                <label>Transaction No.</label>
                                <span id="viewTransactionNo">TXN123456789</span>
                            </div>
                        </div>
                    </div>

                    <!-- Additional Information -->
                    <div class="detail-section full-width">
                        <h4 class="section-title">Additional Information</h4>
                        <div class="detail-row">
                            <div class="detail-item full-width">
                                <label>Notes</label>
                                <div id="viewNotes" class="notes-content">
                                    Special requests: Late check-in, extra towels
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-secondary" onclick="closeModal('viewBookingModal')">Close</button>
            <button class="btn btn-warning" onclick="editBookingFromView()">Edit Booking</button>
        </div>
    </div>
</div>
@endsection