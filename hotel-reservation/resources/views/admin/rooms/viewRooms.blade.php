@extends('layouts.admin-app')

@section('title', 'Rooms')



@section('content')
<main class="main-content">
    <div class="page-header">
        <h1>Room Management</h1>
        <p>Hotel rooms and rates.</p>
    </div>

    <div class="content-section">
        <div class="section-header">
            <h2 class="section-title">Room Types</h2>
            {{-- @can('add-room')
            <button class="btn btn-primary" onclick="openModal('addRoomModal')">
                    Add New Room Type
            </button>
            @endcan --}}
            @can('add-room')
                <a href="{{ route('admin-room-type-create') }}"> 
                    <button class="btn btn-primary">
                        Add Room Type
                    </button>
                </a>
            @endcan
        </div>
        <table class="data-table" id="roomsTable">
            <thead>
                <tr>
                    <th>Room Type</th>
                    <th>Rate/Night</th>
                    {{-- <th>Max Guests</th> --}}
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($roomTypes as $roomType)
                    <tr>
                        <td>{{ $roomType->room_name }}</td>
                        <td>{{ $roomType->price }}</td>
                        {{-- <td>{{ $roomType->max_guests }}</td> --}}
                        <td>
                            @can('edit-room')
                                <a href="{{ route('admin-room-type-edit', $roomType->room_type) }}" style="text-decoration: none">
                                    <button class="btn btn-warning">Edit</button>
                                </a>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#delete-confirm" data-role-id="{{ $roomType->room_type }}" >
                                        Delete
                                </button>
                            @endcan
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div><br><br>

        <div class="section-header">
            <h2 class="section-title">Rooms</h2>
            @can('add-room')
                <a href="{{ route('admin-room-type-create') }}"> 
                    <button class="btn btn-primary">
                        Add Room Type
                    </button>
                </a>
            @endcan
        </div>
        <table class="data-table" id="roomsTable">
            <thead>
                <tr>
                    <th>Room Number</th>
                    <th>Type</th>
                    {{-- <th>Rate/Night</th> --}}
                    {{-- <th>Status</th> --}}
                    {{-- <th>Amenities</th> --}}
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($rooms as $room)
                    <tr>
                        <td>{{ $room->room_id }}</td>
                        <td>{{ $room->roomType->room_name }}</td>
                        <td>
                            @can('edit-room')
                                <a href="{{ route('admin-room-type-edit', $roomType->room_type) }}" style="text-decoration: none">
                                    <button class="btn btn-warning">Edit</button>
                                </a>
                                <button class="btn btn-danger" onclick="deleteRoom(this)">Delete</button>
                            @endcan
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

  <div id="addRoomModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Add New Room</h2>
                <button class="close-btn" onclick="closeModal('addRoomModal')">&times;</button>
            </div>
            <form id="addRoomForm">
                <div class="form-grid">
                    <div class="form-group">
                        <label for="roomNumber">Room Number</label>
                        <input type="text" id="roomNumber" required>
                    </div>
                    <div class="form-group">
                        <label for="roomType">Room Type</label>
                        <select id="roomType" required>
                            <option value="">Select Type</option>
                            <option value="Standard">Standard</option>
                            <option value="Deluxe">Deluxe</option>
                            <option value="Suite">Suite</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="roomRate">Rate per Night ($)</label>
                        <input type="number" id="roomRate" required>
                    </div>
                    <div class="form-group">
                        <label for="roomStatus">Status</label>
                        <select id="roomStatus" required>
                            <option value="Available">Available</option>
                            <option value="Occupied">Occupied</option>
                            <option value="Maintenance">Maintenance</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="roomAmenities">Amenities</label>
                    <textarea id="roomAmenities" rows="3" placeholder="WiFi, AC, Mini Bar, etc."></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Add Room</button>
            </form>
        </div>
    </div>

<div class="modal fade" id="delete-confirm" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalLabel">Delete Role</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p id="modalBody">Are you sure you want to delete this role?</p>
            </div>
            <div class="modal-footer">
                <form id="deleteForm" method="POST" action={{ route('role-delete', $roomType->room_type)}}>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

@endsection

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
        const roleId = button.getAttribute('data-role-id');
        const form = deleteModal.querySelector('#deleteForm');

        const action = "{{ route('room-type-delete', ':id') }}".replace(':id', roleId);
        form.action = action;
    });
</script>
@endsection
