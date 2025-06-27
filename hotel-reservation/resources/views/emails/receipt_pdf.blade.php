<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Booking Receipt</title>
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
            color: #333;
            padding: 20px;
            line-height: 1.6;
            background-color: #f8f9fa;
        }

        .receipt-container {
            background-color: #fff;
            padding: 30px;
            border: 1px solid #ddd;
            max-width: 700px;
            margin: auto;
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #4a5568;
        }

        .details {
            margin-bottom: 20px;
        }

        .details p {
            margin: 8px 0;
        }

        .details strong {
            display: inline-block;
            width: 150px;
            color: #1a202c;
        }

        .footer {
            margin-top: 40px;
            text-align: center;
            font-size: 14px;
            color: #6c757d;
        }

        .total {
            font-size: 18px;
            font-weight: bold;
            color: #e53e3e;
        }

        .highlight {
            background-color: #edf2f7;
            padding: 10px;
            border-radius: 5px;
        }

    </style>
</head>
<body>
    <div class="receipt-container">
        <h2>Booking Receipt</h2>

        <div class="details highlight">
            <p><strong>Booking ID:</strong> {{ $booking->booking_id }}</p>
            <p><strong>Room Type:</strong> {{ $booking->room_type }}</p>
            <p><strong>Check-in:</strong> {{ \Carbon\Carbon::parse($booking->check_in_date)->format('F j, Y') }}</p>
            <p><strong>Check-out:</strong> {{ \Carbon\Carbon::parse($booking->check_out_date)->format('F j, Y') }}</p>
            <p><strong>Guest Count:</strong> {{ $booking->guest_count }}</p>
        </div>

        <div class="details">
            <p class="total"><strong>Total Amount:</strong> ₱{{ number_format($booking->price, 2) }}</p>
        </div>

        <div class="footer">
            Thank you for booking with <strong>The Haven</strong>. We look forward to your stay!
        </div>
    </div>
</body>
</html>
