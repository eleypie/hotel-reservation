@extends('layouts.admin-app')

@section('title', 'Edit Role')

@section('content')
<main class="main-content">
    <div class="content-section">
        <div class="section-header">
            <h2 class="section-title">Editing {{ $role->name }} Role</h2>
        </div>
        <form method="POST" action="{{ route('role-update', $role) }}">
            @method('PUT')
            @include('admin.roles._form')
        </form>
    </div>
</main>
@endsection