@extends('layouts.app')

@section('content')
<div class="container-fluid min-vh-100 d-flex align-items-center justify-content-center p-4">
    <div class="row register-container w-100" style="max-width: 1200px;">
        <!-- Registration Form Column -->
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
                <h1 class="welcome-text">Create your <strong>Account</strong></h1>
                <p class="text-muted mb-4">Join our luxury community to access exclusive benefits</p>
                 @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops! Something went wrong.</strong>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="first_name" class="form-label">First Name</label>
                            <input type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" required autofocus>
                            @error('first_name') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input type="text" class="form-control" name="last_name" value="{{ old('last_name') }}">
                            @error('last_name') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                        @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone Number</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                            <input type="tel" class="form-control" name="phone" value="{{ old('phone') }}">
                        </div>
                        @error('phone') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="mb-3 position-relative">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" min="8" name="password" required>
                        <i class="fas fa-eye password-toggle" id="togglePassword"></i>
                        <div class="progress mt-2">
                            <div class="progress-bar" role="progressbar" style="width: 0%"></div>
                        </div>
                        <div class="password-strength text-muted"></div>
                        @error('password') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="mb-3 position-relative">
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" name="password_confirmation" required>
                        <i class="fas fa-eye password-toggle" id="toggleConfirmPassword"></i>
                    </div>

                    <div class="form-check mb-4">
                        <input class="form-check-input" type="checkbox" id="terms" required>
                        <label class="form-check-label" for="terms">
                            I agree to the <a href="#" class="link-accent">Terms of Service</a> and <a href="#" class="link-accent">Privacy Policy</a>
                        </label>
                    </div>

                    <div class="d-grid mb-4">
                        <button type="submit" class="btn btn-primary btn-lg">
                            Create Account <i class="fas fa-user-plus ms-2"></i>
                        </button>
                    </div>

                    <div class="text-center">
                        <p class="mb-0">Already have an account? 
                            <a href="{{ route('login') }}" class="link-accent">Sign in here</a>
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
        <div class="col-lg-6 register-image d-none d-lg-flex">
            <div class="register-image-content">
                <h2 class="display-5 mb-3">Unlock Exclusive Benefits</h2>
                <ul class="list-unstyled mb-4">
                    <li class="mb-2"><i class="fas fa-check-circle me-2"></i> Best rate guarantee</li>
                    <li class="mb-2"><i class="fas fa-check-circle me-2"></i> Priority room upgrades</li>
                    <li class="mb-2"><i class="fas fa-check-circle me-2"></i> Early check-in/late check-out</li>
                    <li class="mb-2"><i class="fas fa-check-circle me-2"></i> Exclusive member rates</li>
                    <li><i class="fas fa-check-circle me-2"></i> Personalized concierge service</li>
                </ul>
                <div class="cta-wrapper">
                    <a href="{{ route('home') }}" class="btn btn-outline-light me-2 arrow-button">
                        EXPLORE OUR SUITES
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
