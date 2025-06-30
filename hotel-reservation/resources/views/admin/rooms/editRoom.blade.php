@extends('layouts.admin-app')

@section('title', 'Edit Roon')

@section('content')
<main class="main-content">
    <div class="content-section">
        <div class="section-header">
            <h2 class="section-title">Editing Room</h2>
        </div>
        <form method="POST" action="{{ route('room-update', $room->room_id) }}">
            @method('PUT')
            @include('admin.rooms._form')
        </form>
    </div>
</main>
@endsection