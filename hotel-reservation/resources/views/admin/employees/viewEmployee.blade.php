@extends('layouts.admin-app')

@section('title', 'Employees')

@section('content')
<main class="main-content">
    <div class="page-header">
        <h1>Employee Management</h1>
        <p>Manage employee accounts and permissions.</p>
    </div>
    <div class="content-section">
        <div class="section-header">
            <h2 class="section-title">Employees</h2>
            @can('create-user')
                <a href="{{ route('admin-employees-create') }}"> 
                    <button class="btn btn-primary">
                        New Employee
                    </button>
                </a>
            @endcan
        </div>
        <table class="data-table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Role</th>
                    <th class="actions-col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{$user->first_name}} {{$user->last_name}}</td>
                    <td>{{$user->getRoleNames()->first();}}</td>
                    <td class="actions-btns">
                        @can('edit-user')
                            <a href="{{ route('admin-employees-update', $user->user_id) }}">
                                <button class="btn btn-warning">Edit</button>
                            </a>
                        @endcan
                        @can('delete-user')
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete-confirm" 
                                    data-role-id="{{ $user->user_id }}">
                                    Delete
                            </button>
                        @endcan
                    </td>
                </tr>
                @endforeach
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

<div id="addEmployeeModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <h2>Add New Employee</h2>
            <button class="close-btn" onclick="closeModal('addEmployeeModal')">&times;</button>
        </div>
        <form method="POST" action="{{ route('employees-store') }}">
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
    </div>
</div>

<div class="modal fade" id="delete-confirm" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" >
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalLabel">Delete Employee</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p id="modalBody">Are you sure you want to delete this employee?</p>
            </div>
            <div class="modal-footer">
                <form id="deleteForm" method="POST" action={{ route('employee-delete', $user->user_id)}}>
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
        const empId = button.getAttribute('data-role-id');
        const form = deleteModal.querySelector('#deleteForm');

        const action = "{{ route('employee-delete', ':id') }}".replace(':id', empId);
        form.action = action;
    });
</script>
@endsection