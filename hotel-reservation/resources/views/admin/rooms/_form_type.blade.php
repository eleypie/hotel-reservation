@csrf

@php
    $roomType = $roomType ?? null;
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
            <label for="room_namee">Name of Room Type</label>
            <input type="text" name="room_name" value="{{ old('room_name', $roomType?->room_name) }}" required>
        </div>
        <div class="form-group mb-3">
            <label for="price">Rate/Night</label>
            <input type="text" name="price" value="{{ old('price', $roomType?->price) }}" required>
        </div>
        <div class="form-group ">
            <label for="max_guests">Max Number of Guests</label>
            <input type="text" name="max_guests" value="{{ old('max_guests', $roomType?->max_guests) }}" required>
        </div>
        <div class="d-flex flex-row">
            <button type="submit" class="btn btn-primary" style="width:12rem">
                {{ isset($roomType) ? 'Update Room Type' : 'Add Room Type' }}
            </button>
            <a href="{{ route('admin-rooms') }}">
                <button type="button" class="btn btn-secondary" style="margin-top: 1rem; height:2.7rem;">
                    Cancel
                </button>
            </a>
        </div>
    </div>
</div>
