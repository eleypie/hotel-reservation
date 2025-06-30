@extends('layouts.admin-app')

@section('title', 'Add Room Type')

@section('content')
<main class="main-content">
    <div class="content-section">
        <div class="section-header">
            <h2 class="section-title">Adding Room Type</h2>
        </div>
        <form method="POST" action="{{ route('admin-room-type-store') }}">
            @include('admin.rooms._form_type')
        </form>
    </div>
</main>
@endsection