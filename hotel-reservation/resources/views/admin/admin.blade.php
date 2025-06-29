{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href={{ asset('css\admin.css') }}>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <title>Hotel Admin Dashboard</title>
</head>
<body>
    <div id="adminContainer" class="admin-container" style="display: block;">
        <header class="admin-header">

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
                                <a href="{{ route('admin-rooms')}}" class="nav-link">Room Management</a>
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
            <div id="dashboard" class="content-section">
                @include('admin.dashboard')
            </div>

            <div id="rooms" class="section hidden">
                @include('admin.rooms')
            </div>

            <div id="bookings" class="section hidden">
                @include('admin.bookings')
            </div>

            <div id="checkin" class="section hidden">
                @include('admin.checkin')
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
                @include('admin.employees')
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

    <script src={{ asset('js\admin.js') }}></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
</body>
</html>   --}}
