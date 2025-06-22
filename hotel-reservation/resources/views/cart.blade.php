<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>My-Cart | TheHaven</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Experience luxury in our Deluxe Room with premium amenities and stunning views">

    <!-- Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css">

    <!-- Fonts & Bootstrap -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="{{ asset('css/cart.css') }}" rel="stylesheet" />  
</head>
<body>

    <!-- Header Section -->
    <header>
        <div class="header-container">
            <a href="#" class="logo">TheHaven</a>
            
            <input type="checkbox" id="side-menu" class="side-menu">
            <label class="hamb" for="side-menu">
                <span class="hamb-line"></span>
            </label>
            
            <nav>
                <ul>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('room') }}">Rooms</a></li>
                    <li><a href="{{ route('ameneties') }}">Amenities</a></li>
                    <li><a href="{{ route('cart') }}">My Cart</a></li>
                    <li><a href="{{ route('contact') }}">Contact Us</a></li>
                    <li><a href="{{ route('about') }}">About Us</a></li>
                    
                    <li class="nav-profile">
                        <div class="profile-dropdown">
                            <button class="profile-toggle">
                                <div class="profile-pic-container">
                                    <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Profile" class="profile-pic">
                                </div>
                                <span class="profile-name">John D.</span>
                                <i class="fas fa-chevron-down dropdown-arrow"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a href="#"><i class="fas fa-history"></i> My Stays</a>
                                <a href="#"><i class="fas fa-sign-out-alt"></i> Sign Out</a>
                            </div>
                        </div>
                    </li>

                    <div class="auth-buttons">
                        <a href="{{ route('signin') }}" class="sign-in">Sign In</a>
                        <a href="{{ route('create-account') }}" class="sign-up">Create Account</a>
                    </div>
                </ul>
            </nav>  
        </div>
    </header>

<div class="cart-container">
    <div class="cart-header">
        <h1>Your Reservation Cart</h1>
    </div>

    @if(session('cart') && count(session('cart')) > 0)
        @foreach(session('cart') as $id => $item)
            <div class="cart-item">
                <img src="{{ asset('images/' . $item['image']) }}" alt="{{ $item['name'] }}">
                <div class="item-details">
                    <h3>{{ $item['name'] }}</h3>
                    <small>Check-in: {{ $item['checkin'] }} | Check-out: {{ $item['checkout'] }}</small><br>
                    <small>Features: {{ $item['features'] ?? 'Standard features' }}</small>
                </div>
                <div class="item-actions">
                    <div class="item-price">₱{{ $item['price'] }}/night</div>

                    <form action="{{ route('cart.update', $id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" class="qty-input">
                        <button type="submit" class="update-btn">Update</button>
                    </form>

                    <form action="{{ route('cart.remove', $id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="remove-btn">Remove</button>
                    </form>
                </div>
            </div>
        @endforeach

        <div class="cart-summary">
            @php
                $total = 0;
                foreach(session('cart') as $item) {
                    $nights = \Carbon\Carbon::parse($item['checkout'])->diffInDays(\Carbon\Carbon::parse($item['checkin']));
                    $total += $item['price'] * $item['quantity'] * $nights;
                }
            @endphp

            <div class="summary-row">Total (with nights): ₱{{ number_format($total, 2) }}</div>
            <button class="checkout-btn">Proceed to Checkout</button>
        </div>
    @else
        <div class="empty-cart">
            <h3>Your cart is empty.</h3>
            <p>Start selecting your rooms to make a reservation.</p>
        </div>
    @endif
</div>

</body>
</html>
