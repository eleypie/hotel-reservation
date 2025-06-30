@extends('layouts.admin-app')

@section('title', 'Dashboard')

@section('content')
<main class="main-content">
    <div id="dashboard" class="section">
        <div class="page-header">
            <h1>Dashboard Overview</h1>
            <p>Welcome back! Here's what's happening at your hotel today.</p>
        </div>

        
    <div class="stats-grid">
        <div class="stat-card">
            <div id="totalBookings" class="stat-value">...</div>
            <div class="stat-label">Total Bookings</div>
        </div>
        <div class="stat-card">
            <div id="occupancyRate" class="stat-value">...</div>
            <div class="stat-label">Occupancy Rate</div>
        </div>
        <div class="stat-card">
            <div id="todaysRevenue" class="stat-value">...</div>
            <div class="stat-label">Today's Revenue</div>
        </div>
        <div class="stat-card">
            <div id="checkInsToday" class="stat-value">...</div>
            <div class="stat-label">Check-ins Today</div>
        </div>
    </div>

<div class="content-section">
    <div class="section-header">
        <h2 class="section-title">Recent Bookings</h2>
    </div>
    <div class="container mt-4 navy-table-container">
    <h3 class="text-center text-primary mb-4">Booking Records</h3>

    <div class="table-responsive">
        <table class="table table-navy table-bordered table-hover text-center align-middle table-borderless">
            <thead>
                <tr>
                    <th>Booking ID</th>
                    <th>Guest Name</th>
                    <th>Room</th>
                    <th>Check In</th>
                    <th>Check Out</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bookings as $booking)
                    <tr>
                        <td class="cell">{{ $booking->booking_id }}</td>
                        <td class="cell">{{ $booking->user->first_name }} {{ $booking->user->last_name }}</td>
                        <td class="cell">{{ $booking->room->roomType->room_name }} {{ $booking->room_id }}</td>
                        <td class="cell">{{ \Carbon\Carbon::parse($booking->check_in_date)->format('M d, Y') }}</td>
                        <td class="cell">{{ \Carbon\Carbon::parse($booking->check_out_date)->format('M d, Y') }}</td>
                        <td class="cell">
                            <span class="badge badge-status 
                                @if($booking->status == 'Confirmed') bg-success
                                @elseif($booking->status == 'Pending') bg-warning text-dark
                                @elseif($booking->status == 'Cancelled') bg-danger
                                @else bg-secondary
                                @endif">
                                {{ $booking->status }}
                            </span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>
</div>
</main>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    fetch("{{ route('dashboard.stats') }}")
        .then(res => res.json())
        .then(data => {
            document.getElementById('totalBookings').textContent = data.totalBookings;
            document.getElementById('occupancyRate').textContent = data.occupancyRate + '%';
            document.getElementById('todaysRevenue').textContent = '₱' + Number(data.todaysRevenue).toLocaleString('en-PH', {
                minimumFractionDigits: 2
            });
            document.getElementById('checkInsToday').textContent = data.checkInsToday;
        })
        .catch(err => console.error("Failed to load dashboard data", err));
});
</script>
@endsection