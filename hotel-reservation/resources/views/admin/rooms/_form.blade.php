@csrf

@php
    $room = $room ?? null;
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

<div class="d-flex justify-content-center align-items-center">
    <div class="d-flex flex-column justify-content-between" style="width:30rem">
        <div class="form-group mb-3">
            <label for="room_namee">Room Number</label>
            <input type="text" name="room_id" value="{{ old('room_name', $room?->room_id) }}" required>
        </div>
        <div class="form-group mb-3">
            <label for="price">Room Type</label>
            <select name="room_type" class="form-select" required>
                @foreach ($roomTypes as $type)
                    <option value="{{ $type->room_type }}"
                        {{ (old('room_type', $room->room_type ?? '') == $type->id) ? 'selected' : '' }}>
                        {{ $type->room_name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="d-flex flex-row">
            <button type="submit" class="btn btn-primary" style="width:10rem">
                {{ isset($room) ? 'Update Room' : 'Add Room' }}
            </button>
            <a href="{{ route('admin-rooms') }}">
                <button type="button" class="btn btn-secondary" style="margin-top: 1rem; height:2.7rem;">
                    Cancel
                </button>
            </a>
        </div>
    </div>
</div>
