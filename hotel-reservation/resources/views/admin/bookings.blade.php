@extends('layouts.admin-app')

@section('title', 'Bookings')

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
                    <th>ID</th>
                    <th>Guest</th>
                    <th>Email</th>
                    <th>Room</th>
                    <th>Room Type</th>
                    <th>Check-in</th>
                    <th>Check-out</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bookings as $booking)
                    <tr>
                        <td>{{ $booking->booking_id }}</td>
                        <td>{{ $booking->user->first_name}} {{$booking->user->last_name}}</td>
                        <td>{{ $booking->email_confirmation }}</td>
                        <td>{{ $booking->room_id}}</td>
                        <td>{{ $booking->room->roomType->room_name}}</td>
                        <td>{{ $booking->check_in_date }}</td>
                        <td>{{ $booking->check_out_date }}</td>
                        <td>{{ $booking->total_price}}</td>
                        <td>{{ $booking->status}}</td>
                    </tr>
                @endforeach
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
</main>


<div id="addBookingModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h2>Manual Booking Entry</h2>
            <button class="close-btn" onclick="closeModal('addBookingModal')">&times;</button>
        </div>
        <form id="addBookingForm" method="POST" action="{{ route('manual-booking') }}">
            @csrf
            <div class="form-grid">
                <div class="form-group">
                    <label>First Name</label>
                    <input type="text" name="first_name" required>
                    <label>Last Name</label>
                    <input type="text" name="last_name" required>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email_confirmation" required>
                </div>
                <div class="form-group">
                    <label for="bookingRoom">Room</label>
                    <select id="bookingRoom" name="room_type" required>
                        <option value="" disabled selected>Select Room</option>
                        @foreach($roomTypes as $roomType)
                            <option value="{{ $roomType->room_type }}" data-price="{{ $roomType->price }}">
                                {{ $roomType->room_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="bookingDates">Date</label>
                    <input type="text" id="bookingDates" class="form-control" required>
                    <input type="hidden" name="check_in_date" id="check_in_date">
                    <input type="hidden" name="check_out_date" id="check_out_date">
                </div>
                <div class="form-group">
                    <label>Number of Guest/s</label>
                    <input type="text" name="guest_count" required>
                </div>
                <div class="form-group">
                    <label for="totalAmount">Total Amount ($)</label>
                    <input type="number" id="totalAmount" name="total_price" readonly required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Create Booking</button>
        </form>
    </div>
</div>
@endsection