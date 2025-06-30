@extends('layouts.admin-app')

@section('title', 'Add Room')

@section('content')
<main class="main-content">
    <div class="content-section">
        <div class="section-header">
            <h2 class="section-title">Adding Room </h2>
        </div>
        <form method="POST" action="{{ route('admin-room-store') }}">
            @include('admin.rooms._form')
        </form>
    </div>
</main>
@endsection