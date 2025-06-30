@extends('layouts.admin-app')

@section('title', 'Rooms')

@section('content')
<main class="main-content">
    <div class="page-header">
        <h1>Booking Management</h1>
        <p>View and manage all hotel bookings.</p>
    </div>
    <div class="content-section">
        <div class="section-header">
            <h2 class="section-title">Roles</h2>
            @can('create-booking')
                <a href="{{ route('admin-booking-create') }}"> 
                    <button class="btn btn-primary">
                        Manual Booking
                    </button>
                </a>
            @endcan
        </div>
        <table class="data-table">
             <thead>
                <tr>
                    <th>Booking ID</th>
                    <th>Guest Name</th>
                    
                    <th>Room No</th>
                    <th>Check In</th>
                    <th>Check Out</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bookings as $booking)
                    <tr>
                        <td>{{ $booking->booking_id }}</td>
                        <td>{{ $booking->user->first_name}} {{$booking->user->last_name}}</td>
                        <td>{{ $booking->room_id }}</td>
                        <td>{{ $booking->check_in_date }}</td>
                        <td>{{ $booking->check_out_date }}</td>
                        <td>{{ $booking->status}}</td>
                        <td>
                            <div class="actions-btns">
                                <button class="btn btn-info" onclick="viewBooking({{ $booking->booking_id }})">View</button>
                                @can('edit-booking')
                                    <a href="{{ route('admin-booking-edit', $booking->id) }}">
                                        <button class="btn btn-info">Edit</button>
                                    </a>
                                @endcan
                                @can('delete-booking')
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete-confirm" 
                                            data-id="{{ $booking->id }}">
                                            Delete
                                    </button>
                                @endcan
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
         @if (session('success') || session('error'))
            <div class="position-fixed top-0 end-0 p-3 statusMessage" style="z-index: 1100;">
                <div id="toastMessage" class="toast align-items-center text-white {{ session('success') ? 'bg-success' : 'bg-danger' }} border-0 show" role="alert" aria-live="assertive" aria-atomic="true">
                    <div class="d-flex">
                        <div class="toast-body">
                            {{ session('success') ?? session('error') }}
                        </div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                </div>
            </div>
        @endif
    </div>
</main>
@endsection

<div class="modal fade" id="delete-confirm" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalLabel">Delete Booking</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p id="modalBody">Are you sure you want to delete this booking?</p>
            </div>
            <div class="modal-footer">
                <form id="deleteForm" method="POST" action="{{ route('booking-delete', ':id') }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

@section('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const toastEl = document.querySelector('.toast');
        if (toastEl) {
            const bsToast = bootstrap.Toast.getOrCreateInstance(toastEl);
            setTimeout(() => {
                bsToast.hide(); // hides the toast after 3 seconds
            }, 3000);
        }
    });
</script>

<script>
    const deleteModal = document.getElementById('delete-confirm');

    deleteModal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;
        const id = button.getAttribute('data-id');
        const form = deleteModal.querySelector('#deleteForm');

        const action = "{{ route('booking-delete', ':id') }}".replace(':id', id);
        form.action = action;
    });
</script>
@endsection