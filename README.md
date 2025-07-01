# 🏨 The Haven - Laravel Hotel Booking System

A hotel room booking web application built using **Laravel 10**, featuring a dynamic cart system, room reservations, PDF receipt generation, and email notifications.

## 📦 Features

- 🛏️ Browse and book multiple room types (Deluxe, Family, Partner)
- 🛒 Add multiple bookings to a cart and check out in one go
- 📅 Use date range pickers for check-in/check-out selection
- 📧 Receive email confirmations with PDF receipts
- 📄 Download receipts as PDF after checkout
- 💰 GCash mock payment input (phone and reference number)
- 🔐 User authentication (register/login)
- 🎉 Modal-based confirmation after successful checkout

---

## ⚙️ Tech Stack

- Laravel 10 (PHP Framework)
- Blade Templating Engine
- MySQL / MariaDB
- Bootstrap 5
- JavaScript + jQuery + AJAX
- DomPDF for PDF generation
- Laravel Mail for sending emails

---

## 🚀 Installation

### 1. Clone the repo

```bash
git clone https://github.com/your-username/hotel-reservation.git
cd hotel-reservation
```

### 2. Install dependencies
```bash
composer install
npm install && npm run dev
```

### 3. Edit .env file
```bash
DB_DATABASE=your_db
DB_USERNAME=your_user
DB_PASSWORD=your_pass

MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your_mail_user
MAIL_PASSWORD=your_mail_pass
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=your@email.com
MAIL_FROM_NAME="${APP_NAME}"
```

### 4. Run migrations 
```bash
php artisan migrate
```
### 5. Serve the app
```bash
php artisan serve
```

# 👩‍💼 Project Manager/ UI&UX Designer
- Loriel Ann Coniconde
  
# 🎀 Frontend Developer 
- Loriel Ann Coniconde
- Anaise Nicole Narisma

# ✒️ Technical Writer
- Kristina Amor Marzan
  
# 💻 Backend Developer/ Database Administrator
- Shen Jhoryl Porcalla
- Roan Maye Dinglasan




