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
                <div class="stat-value">156</div>
                <div class="stat-label">Total Bookings</div>
            </div>
            <div class="stat-card">
                <div class="stat-value">89%</div>
                <div class="stat-label">Occupancy Rate</div>
            </div>
            <div class="stat-card">
                <div class="stat-value">$12,450</div>
                <div class="stat-label">Today's Revenue</div>
            </div>
            <div class="stat-card">
                <div class="stat-value">23</div>
                <div class="stat-label">Check-ins Today</div>
            </div>
        </div>

<div class="content-section">
    <div class="section-header">
        <h2 class="section-title">Recent Bookings</h2>
    </div>
    <table class="data-table">
        <thead>
            <tr>
                <th>Booking ID</th>
                <th>Guest Name</th>
                <th>Room</th>
                <th>Check-in</th>
                <th>Check-out</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>BK001</td>
                <td>John Smith</td>
                <td>Deluxe Suite 101</td>
                <td>2025-06-30</td>
                <td>2025-07-03</td>
                <td><span class="status-badge status-confirmed">Confirmed</span></td>
            </tr>
            <tr>
                <td>BK004</td>
                <td>Sarah Wilson</td>
                <td>Standard Room 102</td>
                <td>2025-07-02</td>
                <td>2025-07-06</td>
                <td><span class="status-badge status-pending">Pending</span></td>
            </tr>
            <tr>
                <td>BK005</td>
                <td>Michael Brown</td>
                <td>Deluxe Room 203</td>
                <td>2025-06-29</td>
                <td>2025-07-01</td>
                <td><span class="status-badge status-cancelled">Cancelled</span></td>
            </tr>
            <tr>
                <td>BK006</td>
                <td>Lisa Anderson</td>
                <td>Executive Suite 401</td>
                <td>2025-07-03</td>
                <td>2025-07-08</td>
                <td><span class="status-badge status-confirmed">Confirmed</span></td>
            </tr>
        </tbody>
    </table>
</div>
    </div>
</main>
@endsection