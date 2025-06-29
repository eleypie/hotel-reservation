@extends('layouts.admin-app')

@section('title', 'Roles')

@section('content')
<main class="main-content">
    <div class="page-header">
        <h1>Roles Management</h1>
        <p>Manage user roles and permissions.</p>
    </div>
    <div class="content-section">
        <div class="section-header">
            <h2 class="section-title">Roles</h2>
            @can('create-user')
                <a href="{{ route('admin-role-create') }}"> 
                    <button class="btn btn-primary">
                        New Role
                    </button>
                </a>
            @endcan
        </div>
        <table class="data-table">
            <thead>
                <tr>
                    <th>Role</th>
                    <th>Permissions</th>
                    <th class="actions-col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($roles as $role)
                <tr>
                    <td>{{ $role->name }}</td>
                    <td>
                        @if($role->permissions->isNotEmpty())
                            <ul class="permissions-container">
                                @foreach($role->permissions as $permission)
                                    <li class="permission-item">{{ $permission->name }}</li>
                                @endforeach
                            </ul>
                        @else
                            <em>No permissions</em>
                        @endif
                    </td>
                    <td class="actions-btns">
                        @can('edit-user')
                            <a href="{{ route('admin-role-edit', $role) }}">
                                <button class="btn btn-warning">Edit</button>
                            </a>
                        @endcan
                        @can('delete-user')
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#delete-confirm" data-role-id="{{ $role->id }}">
                                    Delete
                            </button>
                        @endcan
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <table class="data-table" style="margin: 4rem 0rem">
            <tr>
                <td>
                    <div class="section-header">
                        <h2 class="section-title">Permissions</h2>
                        @can('manage-permissions')
                            <a href="{{ route('manage-permission') }}"> 
                                <button class="btn btn-primary">
                                    Manage Permissions
                                </button>
                            </a>
                        @endcan
                    </div>
                    @if($permissions->isNotEmpty())
                        <ul class="permissions-container">
                            @foreach($permissions as $permission)
                                <li class="permission-item" style="font-size:0.8rem">{{ $permission->name }}</li>
                            @endforeach
                        </ul>
                    @else
                        <em>No permissions</em>
                    @endif
                </td>
            </tr>
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
                <h1 class="modal-title fs-5" id="modalLabel">Delete Role</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p id="modalBody">Are you sure you want to delete this role?</p>
            </div>
            <div class="modal-footer">
                <form id="deleteForm" method="POST" action={{ route('role-delete', $role->id)}}>
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
        const roleId = button.getAttribute('data-role-id');
        const form = deleteModal.querySelector('#deleteForm');

        const action = "{{ route('role-delete', ':id') }}".replace(':id', roleId);
        form.action = action;
    });
</script>
@endsection

