@csrf

@php
    $booking = $booking ?? null;
@endphp

@if ($errors->any())
    <div class="position-absolute top-0 end-0 p-3 inputError" style="z-index: 1050;">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Input Error!</strong>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
@endif

<div class="form-grid">
    @if (isset($booking))
        <div class="form-group">
            <label for="booking_id">Booking No.</label>
            <input type="text" name="booking_id" value="{{ old('booking_id', $booking?->booking_id) }}" required readonly>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <input type="text" name="status" value="{{ old('status', $booking?->status) }}" required>
        </div>
    @endif
    @if (!isset($booking))
        <div class="form-group">
            <input type="hidden" name="check_in_date" id="check_in_date" readonly>
            <input type="hidden" name="check_out_date" id="check_out_date" readonly>
        </div><br>
    @else
        <div class="container">
            <div class="form-group d-flex flex-row" >
                <div class="col-md-6">
                    <label for="check_in_date">Check In:</label>
                    <input type="text" name="check_in_date" value="{{ old('check_in_date', $booking?->check_in_date) }}" required readonly>
                </div>
                <div class="col-md-6">
                    <label for="check_out_date">Check Out:</label>
                    <input type="text" name="check_out_date" value="{{ old('check_out_date', $booking?->check_out_date) }}" required readonly>
                </div>
            </div>
        </div><br>
    @endif
    <div class="form-group">
        <label>Guest Details</label>
        <label for="first_name">First Name</label>
        <input type="text" name="first_name" value="{{ old('first_name', $booking?->user->first_name) }}" required>
        <label for="last_name">Last Name</label>
        <input type="text" name="last_name" value="{{ old('last_name', $booking?->user->last_name) }}" required>
        <label for="email">Email</label>
        <input type="email" name="email_confirmation" value="{{ old('email', $booking?->email_confirmation) }}" required>
        <label for="phone">Phone</label>
        <input type="tel" name="phone" value="{{ old('email', $booking?->user->phone) }}">
    </div>
    <div class="form-group">
        <label>Room Details</label>
        @if (isset($booking))
            <label for="room_id">Room No.</label>
            <input type="text" name="room_id" value="{{ old('room_id', $booking?->room->room_id) }}" required readonly>
        @endif
        <label for="room_name">Room Type</label>
        @if (isset($booking))
            <input type="text" name="room_name" value="{{ old('room_name', $booking?->room->roomType->room_name) }}" required readonly>
        @else
            <select id="bookingRoom" name="room_type" required>
                <option value="" disabled selected>Select Room</option>
                @foreach($roomTypes as $roomType)
                    <option value="{{ $roomType->room_type }}" data-price="{{ $roomType->price }}">
                        {{ $roomType->room_name }}
                    </option>
                @endforeach
            </select>
        @endif
        <label for="guest_count">Number of Guests</label>
        <input type="guest_count" name="guest_count" value="{{ old('guest_count', $booking?->guest_count) }}" required>
    </div>
    <div class="form-group">
        <label>Payment Details</label>
        <label for="payment_method">Payment Method</label>
        @if (isset($booking))
            <input type="text" name="payment_method" value="{{ old('payment_method', $booking?->payment->payment_method) }}" required readonly>
        @else
            <select name="payment_method" id="paymentMethodSelect">
                <option value="Cash">Cash</option>
                <option value="GCash">GCash</option>
            </select>
        @endif
        <label for="amount">Amount</label>
        <input type="text" id="totalAmount" name="total_price" value="{{ old('total_price', $booking?->total_price) }}" required readonly>
        <div id="transaction-num" style="display: none">
            <label for="gcash_phone">GCash Number</label>
            <input type="text" name="gcash_phone" id="gcash_phone" value="{{ old('gcash_phone', $booking?->payment->gcash_phone) }}">
            <label for="transaction_number">Transaction Number</label>
            <input type="text" name="transaction_number" id="transaction_number" value="{{ old('transaction_number', $booking?->payment->transaction_number) }}">
        </div>
    </div> <br><br>
    <div class="form-group">
        <label>Note:</label>
        <textarea type="textbox" name="note" value="{{ old('note', $booking?->note) }}"> </textarea>
    </div>
</div>
<button type="submit" class="btn btn-primary">
    {{ isset($booking) ? 'Update Booking' : 'Add Booking' }}
</button>

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    const paymentSelect = document.getElementById('paymentMethodSelect');
    const transactionNum = document.getElementById('transaction-num');
    const gcashNum = document.getElementById('gcash_phone');
    const transactionInput = document.getElementById('transaction_number');

    paymentSelect.addEventListener('change', function () {
        const selected = this.value;

        if (selected === 'Cash') {
            transactionNum.style.display = 'none';
            transactionInput.removeAttribute('required');
            gcashNum.removeAttribute('required');
        } else if (selected === 'GCash') {
            transactionNum.style.display = 'grid';
            gcashNum.setAttribute('required', 'required');
            transactionInput.setAttribute('required', 'required');
        }
    });
});
</script>
@endsection