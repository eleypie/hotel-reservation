@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">My Booking History</h2>

    <!-- Filter Form -->
    <form method="GET" action="{{ route('booking.history') }}" class="row g-3 mb-4">
        <div class="col-md-3">
            <label for="start_date" class="form-label">Start Date</label>
            <input type="date" id="start_date" name="start_date" class="form-control"
                   value="{{ request('start_date') }}">
        </div>

        <div class="col-md-3">
            <label for="end_date" class="form-label">End Date</label>
            <input type="date" id="end_date" name="end_date" class="form-control"
                   value="{{ request('end_date') }}">
        </div>

        {{-- <div class="col-md-3">
            <label for="room_type" class="form-label">Room Type</label>
            <select name="room_type" id="room_type" class="form-select">
                <option value="">All</option>
                @foreach ($roomTypes as $roomType)
                    <option value="{{ $roomType->room_type }}"
                        {{ request('room_type') == $roomType->room_type ? 'selected' : '' }}>
                        {{ $roomType->room_name }}
                    </option>
                @endforeach
            </select>
        </div> --}}

        <div class="col-md-3 d-flex align-items-end">
            <button type="submit" class="btn btn-primary w-100">Filter</button>
        </div>
    </form>

    <!-- Booking History Table -->
    @if ($bookings->count())
        <div class="table-responsive">
            <table class="table table-bordered align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Booking ID</th>
                        <th>Room Type</th>
                        <th>Check-in</th>
                        <th>Check-out</th>
                        <th>Total Price</th>
                        <th>Status</th>
                        <th>Booked On</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bookings as $booking)
                        <tr>
                            <td>{{ $booking->booking_id }}</td>
                            <td>{{ $booking->room->roomType->room_type ?? 'N/A' }}</td>
                            <td>{{ \Carbon\Carbon::parse($booking->check_in_date)->format('M d, Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($booking->check_out_date)->format('M d, Y') }}</td>
                            <td>₱{{ number_format($booking->total_price, 2) }}</td>
                            <td>
                                <span class="badge bg-{{ $booking->status == 'pending' ? 'warning' : 'success' }}">
                                    {{ ucfirst($booking->status) }}
                                </span>
                            </td>
                            <td>{{ $booking->created_at->format('M d, Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-4">
            {{ $bookings->withQueryString()->links() }}
        </div>
    @else
        <div class="alert alert-info">
            No bookings found for the selected filters.
        </div>
    @endif
</div>
@endsection
