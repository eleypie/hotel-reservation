@extends('layouts.admin-app')

@section('title', 'Create Employee')

@section('content')
<main class="main-content">
    <div class="content-section">
        <div class="section-header">
            <h2 class="section-title">Adding Employee Account</h2>
        </div>
        <form method="POST" action="{{ route('employees-store') }}">
            
            @include('admin.employees._form')
        </form>
    </div>
</main>
@endsection