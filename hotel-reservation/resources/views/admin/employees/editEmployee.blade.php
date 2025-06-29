@extends('layouts.admin-app')

@section('title', 'Edit Employee')

@section('content')
<main class="main-content">
    <div class="content-section">
        <div class="section-header">
            <h2 class="section-title">Editing Employee Account</h2>
        </div>
        <form method="POST" action="{{ route('employees-update', $user->user_id) }}">
            @method('PUT')
            @include('admin.employees._form')
        </form>
    </div>
</main>
@endsection