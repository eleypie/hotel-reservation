@extends('layouts.admin-app')

@section('title', 'Create Booking')

@section('content')
<main class="main-content">
    <div class="content-section">
        <div class="section-header">
            <h2 class="section-title">Creating Booking</h2>
        </div>
        <form method="POST" action="{{ route('manual-store') }}">
            @include('admin.bookings._form')
        </form>
    </div>
</main>
@endsection