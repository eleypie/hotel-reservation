@csrf

@php
    $user = $user ?? null;
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

<div class="form-grid">
    <div class="form-group">
        <label for="first-name">First Name</label>
        <input type="text" name="first_name" value="{{ old('first_name', $user?->first_name) }}" required>
    </div>
    <div class="form-group">
        <label for="last-name">Last Name</label>
        <input type="text" name="last_name" value="{{ old('last_name', $user?->last_name) }}" required>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" value="{{ old('email', $user?->email) }}" required>
    </div>
    @if (!isset($user))
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" required>
        </div>
    @endif
    <div class="form-group">
        <label>Role</label>
        <select name="role" required>
            @foreach ($roles as $role)
                <option value="{{ $role->name }}" @if (old('role', $user?->getRoleNames()->first()) == $role->name) selected @endif>
                    {{ ucfirst($role->name) }}
                </option>
            @endforeach
        </select>
    </div>
</div>
<button type="submit" class="btn btn-primary">
    {{ isset($user) ? 'Update Employee' : 'Add Employee' }}
</button>
