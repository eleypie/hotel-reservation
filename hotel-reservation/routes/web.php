<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail;
use App\Http\Controllers\Auth\Request; 
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\RoleController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoomController;
use App\Models\Booking;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Home
Route::get('/', function () {
    return view('home'); // or your home view
})->name('home');

// Rooms
Route::get('/room', function () {
    return view('room'); // update path if needed
})->name('room');

// Amenities
Route::get('/amenities', function () {
    return view('ameneties');
})->name('ameneties');

// My Cart
Route::get('/cart', function () {
    return view('cart');
})->name('cart');

// Contact Us
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

// About Us
Route::get('/about', function () {
    return view('about');
})->name('about');

// About Us
Route::get('/history', function () {
    return view('history');
})->name('history');

// Sign In
Route::get('/signin', function () {
    return view('signin');
})->name('signin');

// Create Account
Route::get('/create-account', function () {
    return view('create-account');
})->name('create-account');

                    //View Room Types 

//Deluxe Room            
Route::get('/view-room-deluxe', function () {
    return view('view-room.deluxe');  // Note: dot notation for folder structure
})->name('deluxe');

//Superior Room
Route::get('/view-room-superior', function () {
    return view('view-room.superior');  
})->name('superior');

//Superior Room
Route::get('/view-room-premier', function () {
    return view('view-room.premier');  
})->name('premier');

//Family Room
Route::get('/view-room-family', function () {
    return view('view-room.family');
})->name('family');

//Executive Room
Route::get('/view-room-executive', function () {
    return view('view-room.executive');
})->name('executive');

//Honeymoon Room
Route::get('/view-room-honeymoon', function () {
    return view('view-room.honeymoon');
})->name('honeymoon');


                    //Booking Form per Room Type
                    
// Deluxe Room Booking
Route::get('/booking-form-deluxe', [BookingController::class, 'showDeluxeForm'])->name('booking-deluxe');


// Executive Room Booking
Route::get('/booking-form-executive', function () {
    return view('booking-form.book-executive');
})->name('booking-executive');

// Family Room Booking
Route::get('/booking-form-family', function () {
    return view('booking-form.book-family');
})->name('booking-family');

// Honeymoon Room Booking
Route::get('/booking-form-honeymoon', function () {
    return view('booking-form.book-honeymoon');
})->name('booking-honeymoon');

// Premier Room Booking
Route::get('/booking-form-premier', function () {
    return view('booking-form.book-premier');
})->name('booking-premier');

// Superior Room Booking
Route::get('/booking-form-superior', function () {
    return view('booking-form.book-superior');
})->name('booking-superior');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
Route::post('/register', [RegisterController::class, 'register'])->name('register'); 

Route::get('/', function () {
    return auth()->check()
        ? redirect('/home')   // if logged in, go to home
        : view('home');    // if guest, show landing page
});

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
});


Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/test', function () {
    return view('test'); // or your home view
})->name('test'); 

Route::post('/book', [BookingController::class, 'store'])->name('booking.store')->middleware('auth'); 

Route::get('/test-mail', function () {
    return 'Booking Receipt mail sent!';
});

Route::get('/booking/{booking}/receipt', [BookingController::class, 'downloadReceipt'])
    ->name('booking.receipt.download')
    ->middleware('auth'); // optional if only logged-in users can download



// admin page routes
// return views
Route::get('/admin', [EmployeeController::class, 'index'])
    ->middleware(['auth', 'role:Admin|Super Admin|Receptionist'])
    ->name('admin-dashboard');


// Rooms CRUD
Route::get('/admin/rooms/create', [RoomController::class, 'createRoom'])
    ->middleware('permission:add-room')
    ->name('admin-room-create');

Route::post('/admin/rooms/create/', [RoomController::class, 'storeRoom'])
    ->middleware('permission:add-room')
    ->name('admin-room-store');

Route::get('/admin/rooms/edit/{id}', [RoomController::class, 'editRoom'])
        ->middleware('permission:edit-room')
        ->name('admin-room-edit');

Route::put('/admin/rooms/update/{id}', [RoomController::class, 'updateRoom'])
    ->middleware('permission:edit-room')
    ->name('room-update');

Route::delete('/admin/rooms/delete/{room}', [RoomController::class, 'destroyRoom'])
    ->middleware('permission:edit-room')
    ->name('room-delete');


// Rooms Types CRUD
Route::get('/admin/rooms', [RoomController::class, 'index'])
    ->middleware('permission:view-room')
    ->name('admin-rooms');

Route::get('/admin/rooms/type/create', [RoomController::class, 'create'])
    ->middleware('permission:add-room')
    ->name('admin-room-type-create');

Route::post('/admin/rooms/type/create/', [RoomController::class, 'store'])
    ->middleware('permission:add-room')
    ->name('admin-room-type-store');

Route::get('/admin/rooms/type/edit/{id}', [RoomController::class, 'edit'])
        ->middleware('permission:edit-room')
        ->name('admin-room-type-edit');

Route::put('/admin/rooms/type/update/{id}', [RoomController::class, 'update'])
    ->middleware('permission:edit-room')
    ->name('room-type-update');

Route::delete('/admin/rooms/type/delete/{id}', [RoomController::class, 'destroy'])
    ->middleware('permission:edit-room')
    ->name('room-type-delete');


// Bookings CRUD
Route::get('/admin/bookings', [BookingController::class, 'index']) 
    ->middleware('permission:create-booking')
    ->name('admin-bookings');

Route::get('/admin/bookings/create', [BookingController::class, 'manualCreate'])
    ->middleware('permission:create-booking')
    ->name('admin-booking-create');

Route::post('/admin/bookings/create', [BookingController::class, 'receptionBookingStore'])
    ->middleware('permission:create-booking')
    ->name('manual-store');

Route::get('/admin/boookings/edit/{id}', [BookingController::class, 'edit'])
        ->middleware('permission:edit-booking')
        ->name('admin-booking-edit');

Route::put('/admin/bookings/update/{booking}', [BookingController::class, 'update'])
    ->middleware('permission:edit-booking')
    ->name('booking-update');

Route::put('/admin/booking/update-status/{booking}', [BookingController::class, 'updateStatus'])
    ->name('booking-status-update')
    ->middleware('permission:edit-booking');

Route::delete('/admin/bookings/delete/{id}', [BookingController::class, 'destroy'])
    ->middleware('permission:delete-booking')
    ->name('booking-delete');



Route::get('/admin/check-in', function() {
    return view('admin.check-in');
})
->middleware(['auth', 'role:Admin|Super Admin|Receptionist'])
->name('admin-checkin');

// Employee CRUD
Route::get('/admin/employees', [EmployeeController::class, 'displayEmployees'])
    ->middleware('permission:view-user')
    ->name('admin-employees');

Route::get('/admin/employees/create', [EmployeeController::class, 'create'])
    ->middleware('permission:create-user')
    ->name('admin-employees-create');

Route::get('/admin/employees/edit', [EmployeeController::class, 'edit'])
    ->middleware('permission:edit-user')
    ->name('admin-employees-edit');

Route::get('/admin/employees/edit/{employee}', [EmployeeController::class, 'edit'])
    ->middleware('permission:edit-user')
    ->name('admin-employees-update');
    
Route::post('/admin/employees/create', [EmployeeController::class, 'storeEmployee'])
    ->middleware('permission:create-user')
    ->name('employees-store');

Route::put('/admin/employees/update/{employee}', [EmployeeController::class, 'update'])
    ->middleware('permission:edit-user')
    ->name('employees-update');

Route::delete('/admin/users/{user_id}', [EmployeeController::class, 'destroy'])
    ->middleware(['auth', 'role:Super Admin'])
    ->name('employee-delete');

//Roles CRUD
Route::get('/admin/role', [RoleController::class, 'index'])
    ->middleware('permission:create-role')
    ->name('admin-roles');

Route::post('/admin/role/create', [RoleController::class, 'store'])
    ->middleware('permission:create-role')
    ->name('role-store');

Route::get('/admin/role/create', [RoleController::class, 'create'])
    ->middleware('permission:create-role')
    ->name('admin-role-create');

Route::get('/admin/role/edit/{role}', [RoleController::class, 'edit'])
    ->middleware('permission:edit-role')
    ->name('admin-role-edit');

Route::put('/admin/role/update/{role}', [RoleController::class, 'update'])
    ->middleware('permission:edit-role')
    ->name('role-update');

Route::delete('/admin/role/delete/{role}', [RoleController::class, 'destroy'])
    ->middleware('permission:delete-role')
    ->name('role-delete');

// Route::get('/admin/permissions', [PermissionController::class, 'index'])
//     ->middleware('permission:manage-permissions')
//     ->name('manage-permission');

Route::post('/admin/permissions', [PermissionController::class, 'store'])
    ->middleware('permission:manage-permissions')
    ->name('permissions-store');

Route::put('/admin/permissions/{permission}', [PermissionController::class, 'update'])
    ->middleware('permission:manage-permissions')
    ->name('permissions-update');

Route::delete('/admin/permissions/{permission}', [PermissionController::class, 'destroy'])
    ->middleware('permission:manage-permissions')
    ->name('permissions-delete');



// delete record

Route::get('/room-availability', [BookingController::class, 'roomAvailability']); 

Route::get('/booking-history', [App\Http\Controllers\BookingController::class, 'history'])
    ->name('booking.history')
    ->middleware('auth');


