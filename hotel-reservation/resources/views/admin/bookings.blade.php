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
                    <th>Check-in</th>
                    <th>Check-out</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
        </table>
    </div>
</main>


<div id="addBookingModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h2>Manual Booking Entry</h2>
            <button class="close-btn" onclick="closeModal('addBookingModal')">&times;</button>
        </div>
        <form id="addBookingForm">
            <div class="form-grid">
                <div class="form-group">
                    <label for="guestName">Guest Name</label>
                    <input type="text" id="guestName" required>
                </div>
                <div class="form-group">
                    <label for="guestEmail">Email</label>
                    <input type="email" id="guestEmail" required>
                </div>
                <div class="form-group">
                    <label for="bookingRoom">Room</label>
                    <select id="bookingRoom" required>
                        <option value="">Select Room</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="checkInDate">Check-in Date</label>
                    <input type="date" id="checkInDate" required>
                </div>
                <div class="form-group">
                    <label for="checkOutDate">Check-out Date</label>
                    <input type="date" id="checkOutDate" required>
                </div>
                <div class="form-group">
                    <label for="totalAmount">Total Amount ($)</label>
                    <input type="number" id="totalAmount" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Create Booking</button>
        </form>
    </div>
</div>
@endsection