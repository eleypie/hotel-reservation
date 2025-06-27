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
            <button class="btn btn-primary" onclick="openModal('addEmployeeModal')">
                New Employee
            </button>
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
                        <button class="btn btn-warning" onclick="editRoom(this)">Edit</button>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete-confirm" 
                                data-title="Delete Employee" data-body="Are you sure you want to delete this employee?">
                                Delete
                        </button>
                    </td>
                </tr>
                @endforeach
        </table>

        {{-- move to upper right --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert" style="z-index: 100">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert" style="z-index: 100">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
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
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalLabel"></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p id="modalBody"></p>
            </div>
            <div class="modal-footer">
                <form method="POST" action={{ route('delete', $user->id)}}>
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