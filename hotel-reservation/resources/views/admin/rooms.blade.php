@extends('layouts.admin-app')

@section('title', 'Rooms')

@section('content')
<main class="main-content">
    <div class="page-header">
        <h1>Room Management</h1>
        <p>Hotel rooms, rates, and amenities.</p>
    </div>

    <div class="content-section">
        <div class="section-header">
            <h2 class="section-title">Rooms</h2>
            <button class="btn btn-primary" onclick="openModal('addRoomModal')">
                    Add New Room
            </button>
        </div>
        <table class="data-table" id="roomsTable">
            <thead>
                <tr>
                    <th>Room Number</th>
                    <th>Type</th>
                    <th>Rate/Night</th>
                    <th>Status</th>
                    <th>Amenities</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>101</td>
                    <td>Suite</td>
                    <td>$250</td>
                    <td><span class="status-badge status-available">Available</span></td>
                    <td>WiFi, AC, Mini Bar</td>
                    <td>
                        <button class="btn btn-warning" onclick="editRoom(this)">Edit</button>
                        <button class="btn btn-danger" onclick="deleteRoom(this)">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td>102</td>
                    <td>Standard</td>
                    <td>$150</td>
                    <td><span class="status-badge status-occupied">Occupied</span></td>
                    <td>WiFi, AC</td>
                    <td>
                        <button class="btn btn-warning" onclick="editRoom(this)">Edit</button>
                        <button class="btn btn-danger" onclick="deleteRoom(this)">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td>201</td>
                    <td>Deluxe</td>
                    <td>$200</td>
                    <td><span class="status-badge status-maintenance">Maintenance</span></td>
                    <td>WiFi, AC, Balcony</td>
                    <td>
                        <button class="btn btn-warning">Edit</button>
                        <button class="btn btn-danger">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
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
@endsection