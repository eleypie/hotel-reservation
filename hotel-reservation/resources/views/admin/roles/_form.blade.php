@csrf

@php
    $role = $role ?? null;
@endphp

@if ($errors->any())
    <div class="position-absolute top-0 end-0 p-3 inputError" style="z-index: 1050;">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Input Error!</strong>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
@endif

<div class=" container-fluid">
    <div class="form-group">
        <label for="first-name">Role Name</label>
        <input type="text" name="name" value="{{ old('name', $role?->name) }}" required>
    </div><br>
    <div class="form-group">
        <label>Assign Permissions</label>
        <div class="row">
            @foreach($permissions as $permission)
                <div class="col-12 col-md-4">
                    <div class="form-check d-flex align-items-center">
                        <input class="form-check-input" type="checkbox" name="permissions[]" 
                            value="{{ $permission->id }}" id="permission-{{ $permission->id }}"
                            {{ in_array($permission?->id, $rolePermissions) ? 'checked' : '' }}>
                        <label class="form-check-label ms-2">
                            {{ $permission->name }}
                        </label>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<button type="submit" class="btn btn-primary">
    {{ isset($role) ? 'Update Role' : 'Add Role' }}
</button>
<a href="{{ route('admin-roles') }}">
    <button type="button" class="btn btn-secondary" style="margin-top: 1rem; height:2.7rem;">
        Cancel
    </button>
</a>
