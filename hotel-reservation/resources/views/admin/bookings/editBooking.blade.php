@extends('layouts.admin-app')

@section('title', 'Edit Booking')

@section('content')
<main class="main-content">
    <div class="content-section">
        <div class="section-header">
            <h2 class="section-title">Editing Booking</h2>
        </div>
        <form method="POST" action="{{ route('booking-update', $booking->id) }}">
            @method('PUT')
            @include('admin.bookings._form')
        </form>
    </div>
</main>
@endsection