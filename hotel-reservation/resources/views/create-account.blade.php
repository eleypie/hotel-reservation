<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account - The Haven</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <link href="{{ asset('css/create-account.css') }}" rel="stylesheet" />
</head>
<body>
    <div class="container-fluid min-vh-100 d-flex align-items-center justify-content-center p-4">
        <div class="row register-container w-100" style="max-width: 1200px;">
            <!-- Registration Form Column -->
            <div class="col-lg-6 p-5 d-flex flex-column justify-content-center">
                <div class="mb-5">
                    <a href="/" class="d-flex align-items-center text-decoration-none">
                        <img src="images/logo.png"
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
                    
                    <form>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="firstName" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="firstName" placeholder="John" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="lastName" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="lastName" placeholder="Doe" required>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="email" placeholder="your@email.com" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone Number</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                <input type="tel" class="form-control" id="phone" placeholder="+1 (555) 123-4567">
                            </div>
                        </div>
                        
                        <div class="mb-3 position-relative">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" placeholder="••••••••" required>
                            <i class="fas fa-eye password-toggle" id="togglePassword"></i>
                            <div class="progress mt-2">
                                <div class="progress-bar" role="progressbar" style="width: 0%"></div>
                            </div>
                            <div class="password-strength text-muted"></div>
                        </div>
                        
                        <div class="mb-3 position-relative">
                            <label for="confirmPassword" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="confirmPassword" placeholder="••••••••" required>
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
                                <a href="{{ route('signin') }}" class="link-accent">Sign in here</a>
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
                            <svg class="arrow-icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path class="arrow-head" d="M12.0519 14.8285L13.4661 16.2427L17.7088 12L13.4661 7.7574L12.0519 9.17161L13.8804 11H6.34321V13H13.8803L12.0519 14.8285Z" fill="currentColor"/>
                                <path class="arrow-circle" fill-rule="evenodd" clip-rule="evenodd" d="M19.7782 19.7782C24.0739 15.4824 24.0739 8.51759 19.7782 4.22183C15.4824 -0.0739417 8.51759 -0.0739417 4.22183 4.22183C-0.0739417 8.51759 -0.0739417 15.4824 4.22183 19.7782C8.51759 24.0739 15.4824 24.0739 19.7782 19.7782ZM18.364 18.364C21.8787 14.8492 21.8787 9.15076 18.364 5.63604C14.8492 2.12132 9.15076 2.12132 5.63604 5.63604C2.12132 9.15076 2.12132 14.8492 5.63604 18.364C9.15076 21.8787 14.8492 21.8787 18.364 18.364Z" fill="currentColor"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>
</html>