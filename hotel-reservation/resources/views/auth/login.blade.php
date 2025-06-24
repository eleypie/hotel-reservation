@extends('layouts.app')

@section('title', 'The Haven - Sign In')

@section('content')
<div class="container-fluid min-vh-100 d-flex align-items-center justify-content-center p-4">
    <div class="row login-container w-100" style="max-width: 1200px;">
        <!-- Login Form Column -->
        <div class="col-lg-6 p-5 d-flex flex-column justify-content-center">
            <div class="mb-5">
                <a href="/" class="d-flex align-items-center text-decoration-none">
                    <img src="{{ asset('images/logo.png') }}"
                         alt="The Haven Logo" 
                         class="me-3"
                         style="height: 50px;">
                    <span class="logo-font h2 fw-bold mb-0">THE HAVEN</span>
                </a>
                <p class="text-muted mt-2">Luxury Hotel & Resorts</p>
            </div>

            <div>
                <h1 class="welcome-text">Welcome back <strong>Guest</strong></h1>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-4">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                        @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" required>
                        @error('password') <small class="text-danger">{{ $message }}</small> @enderror
                        <div class="d-flex justify-content-end mt-2">
                            <a href="{{ route('password.request') }}" class="text-muted small">Forgot Password?</a>
                        </div>
                    </div>

                    <div class="d-grid mb-4">
                        <button type="submit" class="btn btn-primary btn-lg">
                            Sign In <i class="fas fa-arrow-right ms-2"></i>
                        </button>
                    </div>

                    <div class="text-center">
                        <p class="mb-0">Don't have an account? 
                            <a href="{{ route('register') }}" class="link-accent">Create one</a>
                        </p>
                    </div>
                </form>
            </div>

            <div class="mt-auto pt-4">
                <div class="d-flex justify-content-between">
                    <a href="#" class="text-muted small"><i class="fas fa-phone me-2"></i> +1 (555) 123-4567</a>
                    <a href="#" class="text-muted small"><i class="fas fa-envelope me-2"></i> reservations@thehaven.com</a>
                </div>
            </div>
        </div>

        <!-- Image Column -->
        <div class="col-lg-6 login-image d-none d-lg-flex">
            <div class="login-image-content">
                <h2 class="display-5 mb-3">Experience Unmatched Luxury</h2>
                <p class="mb-4">Discover our exclusive suites and world-class amenities designed for your comfort.</p>
                <div class="cta-wrapper">
                    <a href="{{ route('home') }}" class="btn btn-outline-light me-2 arrow-button">
                        EXPERIENCE FIRST - REGISTER LATER
                        <svg class="arrow-icon" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path class="arrow-head" d="M12.0519 14.8285L13.4661 16.2427L17.7088 12L13.4661 7.7574L12.0519 9.17161L13.8804 11H6.34321V13H13.8803L12.0519 14.8285Z" fill="currentColor"/>
                            <path class="arrow-circle" fill-rule="evenodd" clip-rule="evenodd" d="M19.7782 19.7782C24.0739 15.4824 24.0739 8.51759 19.7782 4.22183C15.4824 -0.0739417 8.51759 -0.0739417 4.22183 4.22183C-0.0739417 8.51759 -0.0739417 15.4824 4.22183 19.7782C8.51759 24.0739 15.4824 24.0739 19.7782 19.7782ZM18.364 18.364C21.8787 14.8492 21.8787 9.15076 18.364 5.63604C14.8492 2.12132 9.15076 2.12132 5.63604 5.63604C2.12132 9.15076 2.12132 14.8492 5.63604 18.364C9.15076 21.8787 14.8492 21.8787 18.364 18.364Z" fill="currentColor"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
