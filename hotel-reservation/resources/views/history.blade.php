@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<style>
    .history-header {
        margin-bottom: 30px;
        text-align: center;
    }
    .history-title {
        font-size: 2rem;
        font-weight: bold;
    }
    .booking-card {
        border: 1px solid #ddd;
        border-radius: 10px;
        margin-bottom: 30px;
        overflow: hidden;
        box-shadow: 0 4px 8px rgba(0,0,0,0.05);
    }
    .booking-header, .booking-footer {
        padding: 15px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: #f8f9fa;
    }
    .booking-body {
        display: flex;
        gap: 20px;
        padding: 15px;
    }
    .room-image {
        width: 180px;
        height: 120px;
        object-fit: cover;
        border-radius: 8px;
    }
    .room-name {
        margin: 0;
        font-size: 1.2rem;
        font-weight: bold;
    }
    .booking-date {
        margin: 5px 0;
        color: #666;
    }
    .amenities {
        margin-top: 10px;
    }
    .amenity-badge {
        background: #e9ecef;
        padding: 5px 10px;
        margin-right: 5px;
        border-radius: 20px;
        font-size: 0.9rem;
    }
    .booking-status {
        padding: 5px 10px;
        border-radius: 20px;
        font-size: 0.9rem;
    }
    .status-completed {
        background-color: #28a745;
        color: white;
    }
    .booking-price {
        font-size: 1.1rem;
        font-weight: bold;
    }
    .action-btns button {
        margin-left: 10px;
    }
</style>

@include('nav')
<div class="container">
    <div class="history-header">
        <h1 class="history-title">Booking History</h1>
    </div>

    
    @forelse ($bookings as $booking)
        <div class="booking-card">
            <div class="booking-header">
                <span class="booking-id">Booking #{{ $booking->booking_id }}</span>
                <span class="booking-status status-completed">{{ ucfirst($booking->status) }}</span>
            </div>
            <div class="booking-body">
                @php
                    $roomImages = [
                        'Deluxe'     => 'images/deluxe-1.jpg',
                        'Family Suite'     => 'images/family-1.jpg',
                        'Executive Suite'  => 'images/executive-2.jpg',
                        'Premier'    => 'images/premier-1.jpg',
                        'Superior'   => 'images/superior-1.jpg',
                        'Honeymoon Suite'  => 'images/honeymoon-1.jpg',
                    ];

                    $roomName = $booking->room->roomType->room_name ?? 'Default';
                    $imagePath = $roomImages[$roomName] ?? 'images/default-room.jpg';
                @endphp
                <img src="{{ asset($imagePath) }}" alt="{{ $roomName }}" class="room-image">
                <div class="booking-details">
                    <h3 class="room-name">{{ $booking->room->roomType->room_name ?? 'N/A' }}</h3>
                    <div class="booking-date">
                        <i class="far fa-calendar-alt"></i>
                        {{ \Carbon\Carbon::parse($booking->check_in_date)->format('M d, Y') }} -
                        {{ \Carbon\Carbon::parse($booking->check_out_date)->format('M d, Y') }}
                        ({{ \Carbon\Carbon::parse($booking->check_out_date)->diffInDays($booking->check_in_date) }} nights)
                    </div>
                    <p>2 Adults • Free Breakfast • 45 sqm</p>
                    <div class="amenities">
                        <span class="amenity-badge"><i class="fas fa-wifi"></i> WiFi</span>
                        <span class="amenity-badge"><i class="fas fa-tv"></i> TV</span>
                        <span class="amenity-badge"><i class="fas fa-snowflake"></i> AC</span>
                        <span class="amenity-badge"><i class="fas fa-wine-bottle"></i> Mini Bar</span>
                    </div>
                </div>
            </div>
            <div class="booking-footer">
                <div class="booking-price">&#8369;{{ number_format($booking->total_price, 2) }}</div>
                <div class="action-btns">
                    {{-- <a href="{{ route('booking.receipt.pdf', $booking->id) }}" class="btn btn-outline-secondary">View Receipt</a> --}}
                    @php
                        $roomName = $booking->room->roomType->room_name ?? 'Default';

                         $routeMap = [
                            'Deluxe'     => 'booking-deluxe',
                            'Family Suite'     => 'booking-family',
                            'Executive Suite'  => 'booking-executive',
                            'Premier'    => 'booking-premier',
                            'Superior'   => 'booking-superior',
                            'Honeymoon Suite'  => 'booking-honeymoon',
                        ];

                        $routeName = $routeMap[$roomName] ?? 'room'; // fallback to a default route if not found
                    @endphp

                    <a href="{{ route($routeName) }}" class="btn btn-primary">Book Again</a>
                </div>
            </div>
        </div>
    @empty
        <div class="text-center py-5">
            <i class="far fa-calendar-alt fa-3x text-muted"></i>
            <h4 class="mt-3">No Bookings Yet</h4>
            <p>Your upcoming and past bookings will appear here.</p>
            <a href="{{ route('room') }}" class="btn btn-primary">Browse Rooms</a>
        </div>
    @endforelse

    <div class="d-flex justify-content-center mt-4">
        {{ $bookings->links() }}
    </div>
</div>
@endsection
