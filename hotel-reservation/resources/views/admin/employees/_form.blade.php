@csrf

@php
    $user = $user ?? null;
@endphp


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
