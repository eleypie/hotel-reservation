@extends('layouts.admin-app')

@section('title', 'Check In')

@section('content')
<main class="main-content">
    <div class="page-header">
        <h1>Check-In/Out System</h1>
        <p>Manage guest check-ins, check-outs, and room status.</p>
    </div>

    <div class="content-section">
        <div class="section-header">
            <h2 class="section-title">Today's Check-ins</h2>
        </div>
        <table class="data-table">
            <thead>
                <tr>
                    <th>Guest Name</th>
                    <th>Room</th>
                    <th>Expected Time</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
        </table>
    </div>

    <div class="content-section">
        <div class="section-header">
            <h2 class="section-title">Today's Check-outs</h2>
        </div>
        <table class="data-table">
            <thead>
                <tr>
                    <th>Guest Name</th>
                    <th>Room</th>
                    <th>Expected Time</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
        </table>
    </div>
</main>
@endsection