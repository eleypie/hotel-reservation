@extends('layouts.admin-app')

@section('title', 'Edit Room Type')

@section('content')
<main class="main-content">
    <div class="content-section">
        <div class="section-header">
            <h2 class="section-title">Editing Room Type</h2>
        </div>
        <form method="POST" action="{{ route('room-type-update', $roomType->room_type) }}">
            @method('PUT')
            @include('admin.rooms._form_type')
        </form>
    </div>
</main>
@endsection