<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href={{ asset('css\admin.css') }}>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <title>Hotel Admin Dashboard</title>
</head>
<body>
    <div id="adminContainer" class="admin-container" style="display: block;">
        <header class="admin-header">
            <button onclick="showSideNav()" id="openNavbar" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="bi bi-list"></i>
            </button> 
            <button class="logout-btn" onclick="logout()">
                <i class="bi bi-box-arrow-right"></i> 
                    <span class="logout-text">Logout</span>
            </button>
        </header>
        <aside class="sidebar" id="sideNav">
            <button onclick="showSideNav()" id="closeNavbar">
                <i class="bi bi-x-lg"></i>
            </button>
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <div class="sidebar-nav row collapse navbar-collapse" id="navbarContent">
                        <div class="sidebar-header" style="align-items: center;">
                            <h2>Hotel Admin</h2>
                        </div>
                        <ul class="nav-menu">
                            <li class="nav-item">
                                <a href="#" class="nav-link active" onclick="showSection('dashboard', this)">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link" onclick="showSection('rooms', this)">Room Management</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link" onclick="showSection('bookings', this)">Booking Management</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link" onclick="showSection('checkin', this)">Check-In/Out</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link" onclick="showSection('staff', this)">Staff Assignments</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link" onclick="showSection('employee-management', this)">Employee Management</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link" onclick="showSection('reports', this)">Reports</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </aside>
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
                    </table>
                </div>
            </div>

            <div id="rooms" class="section hidden">
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
                                    <button class="btn btn-warning" onclick="editRoom(this)">Edit</button>
                                    <button class="btn btn-danger" onclick="deleteRoom(this)">Delete</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div id="bookings" class="section hidden">
                <div class="page-header">
                    <h1>Booking Management</h1>
                    <p>View and manage all hotel bookings.</p>
                </div>

                <div class="content-section">
                    <div class="section-header">
                        <h2 class="section-title">All Bookings</h2>
                        <button class="btn btn-primary" onclick="openModal('addBookingModal')">
                             Manual Booking
                        </button>
                    </div>
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Guest</th>
                                <th>Email</th>
                                <th>Room</th>
                                <th>Check-in</th>
                                <th>Check-out</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>

            <div id="checkin" class="section hidden">
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
            </div>

            <div id="staff" class="section hidden">
                <div class="page-header">
                    <h1>Staff Assignments</h1>
                    <p>Assign rooms to housekeeping and maintenance staff.</p>
                </div>

                <div class="content-section">
                    <div class="section-header">
                        <h2 class="section-title">Room Assignments</h2>
                        <button class="btn btn-primary" onclick="openModal('assignStaffModal')">
                            New Assignment
                        </button>
                    </div>
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Room</th>
                                <th>Task Type</th>
                                <th>Assigned To</th>
                                <th>Priority</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>

            <div id="employee-management" class="section hidden">
                <div class="page-header">
                    <h1>Employee Management</h1>
                    <p>Manage employee accounts and permissions.</p>
                </div>
                <div class="content-section">
                    <div class="section-header">
                        <h2 class="section-title">Employees</h2>
                        <button class="btn btn-primary" onclick="openModal('addEmployeeModal')">
                            New Employee
                        </button>
                    </div>
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Role</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{$user->first_name}} {{$user->last_name}}</td>
                                <td>{{$user->getRoleNames()->first();}}</td>
                                <td>
                                    <button class="btn btn-warning" onclick="editRoom(this)">Edit</button>
                                    <form method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete-confirm" 
                                            data-title="Delete Employee" data-body="Are you sure you want to delete this employee?">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                    </table>
                </div>
            </div>

            <div id="reports" class="section hidden">
                <div class="page-header">
                    <h1>Reports & Analytics</h1>
                    <p>View revenue reports and occupancy trends.</p>
                </div>

                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="stat-value">$45,230</div>
                        <div class="stat-label">Monthly Revenue</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-value">87%</div>
                        <div class="stat-label">Average Occupancy</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-value">4.8</div>
                        <div class="stat-label">Guest Rating</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-value">342</div>
                        <div class="stat-label">Total Guests</div>
                    </div>
                </div>

                <div class="content-section">
                    <div class="section-header">
                        <h2 class="section-title">Revenue Trends</h2>
                    </div>
                    <p>Revenue analytics and charts would be displayed here in a real application.</p>
                </div>
            </div>
        </main>
    </div>

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

    <div id="addBookingModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Manual Booking Entry</h2>
                <button class="close-btn" onclick="closeModal('addBookingModal')">&times;</button>
            </div>
            <form id="addBookingForm">
                <div class="form-grid">
                    <div class="form-group">
                        <label for="guestName">Guest Name</label>
                        <input type="text" id="guestName" required>
                    </div>
                    <div class="form-group">
                        <label for="guestEmail">Email</label>
                        <input type="email" id="guestEmail" required>
                    </div>
                    <div class="form-group">
                        <label for="bookingRoom">Room</label>
                        <select id="bookingRoom" required>
                            <option value="">Select Room</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="checkInDate">Check-in Date</label>
                        <input type="date" id="checkInDate" required>
                    </div>
                    <div class="form-group">
                        <label for="checkOutDate">Check-out Date</label>
                        <input type="date" id="checkOutDate" required>
                    </div>
                    <div class="form-group">
                        <label for="totalAmount">Total Amount ($)</label>
                        <input type="number" id="totalAmount" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Create Booking</button>
            </form>
        </div>
    </div>

    <div id="assignStaffModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Assign Staff</h2>
                <button class="close-btn" onclick="closeModal('assignStaffModal')">&times;</button>
            </div>
            <form id="assignStaffForm">
                <div class="form-grid">
                    <div class="form-group">
                        <label for="assignRoom">Room</label>
                        <select id="assignRoom" required>
                            <option value="">Select Room</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="taskType">Task Type</label>
                        <select id="taskType" required>
                            <option value="">Select Task</option>
                            <option value="Housekeeping">Housekeeping</option>
                            <option value="Maintenance">Maintenance</option>
                            <option value="Deep Cleaning">Deep Cleaning</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="assignedStaff">Assign To</label>
                        <select id="assignedStaff" required>
                            <option value="">Select Staff</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="priority">Priority</label>
                        <select id="priority" required>
                            <option value="Low">Low</option>
                            <option value="Medium">Medium</option>
                            <option value="High">High</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="taskNotes">Notes</label>
                    <textarea id="taskNotes" rows="3" placeholder="Additional instructions..."></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Assign Task</button>
            </form>
        </div>
    </div>

    <div id="addEmployeeModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Add New Employee</h2>
                <button class="close-btn" onclick="closeModal('addEmployeeModal')">&times;</button>
            </div>
            <form method="POST" action="{{ route('employees.store') }}">
                @csrf
                <div class="form-grid">
                    <div class="form-group">
                        <label for="first-name">First Name</label>
                        <input type="text" name="first_name" required>
                        <label for="last-name">Last Name</label>
                        <input type="text" name="last_name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email"  required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password"  required>
                    </div>
                    <div class="form-group">
                        <label>Role</label>
                        <select name="role" required>
                            @foreach ($roles as $role)
                                <option value="{{ $role->name }}">{{ ucfirst($role->name) }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Add Employee</button>
            </form>
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
        </div>
    </div>

    <div class="modal fade" id="delete-confirm" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalLabel"></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p id="modalBody"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger">Delete</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    <script src={{ asset('js\admin.js') }}></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>  
