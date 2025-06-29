@extends('layouts.admin-app')

@section('title', 'Create Role')

@section('content')
<main class="main-content">
    <div class="content-section">
        <div class="section-header">
            <h2 class="section-title">Creating Role</h2>
        </div>
        <form method="POST" action="{{ route('role-store') }}">
            @include('admin.roles._form')
        </form>
    </div>
</main>
@endsection