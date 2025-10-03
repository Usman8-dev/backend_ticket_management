<?php

use App\Http\Middleware\ValidUser;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BusController;
use App\Http\Controllers\TripController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\BookTicketController;
use App\Http\Controllers\NewCustomerController;

Route::get('/', function () {
    return view('welcome');
});

// login form show
Route::get('/loginForm', function () {
    return view('loginForm');
})->name('loginForm');

Route::post('/login' , [CustomerController::class, 'login'])->name('Customer login');



// register form show
Route::get('/registerForm', function () {
    return view('registerForm');
})->name('register');

Route::post('/register' , [CustomerController::class, 'register'])->name('Customer Register');

Route::get('/logout', [CustomerController::class, 'logout'])->name('Customer Logout');


// customer dashboard

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard')->middleware(['auth', ValidUser::class . ':customer']);

Route::middleware(['auth', ValidUser::class . ':customer'])->group(function () {
    Route::get('/dashboard', [BookTicketController::class, 'index'])->name('dashboard');
    Route::get('/select-seat/{trip_id}', [BookTicketController::class, 'selectSeat'])->name('select_seat');
    Route::post('/book-ticket', [BookTicketController::class, 'bookTicket'])->name('book_ticket');
    Route::get('/my-tickets', [BookTicketController::class, 'myTickets'])->name('My_Ticket');
    Route::get('/download-ticket/{id}', [BookTicketController::class, 'downloadTicket'])->name('download.ticket');
    
});


//admin dashboard
// Route::get('/admindashboard', function () {
//     return view('admin_dashboard');
// })->name('admindashboard')->middleware(['auth', ValidUser::class . ':admin']);

Route::middleware(['auth', ValidUser::class . ':admin'])->group(function () {
    Route::get('/admindashboard', [AdminController::class, 'index'])->name('admindashboard');
    Route::put('/admin/update-role/{id}', [AdminController::class, 'updateRole'])->name('admin.updateRole');
    Route::delete('/admin/user/{id}', [AdminController::class, 'deleteUser'])->name('admin.deleteUser');
    // buses 
    Route::get('/admin/buses', [BusController::class, 'index'])->name('admin.buses.index');
    Route::post('/admin/buses', [BusController::class, 'store'])->name('admin.buses.store');
    Route::put('/admin/buses/{id}', [BusController::class, 'update'])->name('admin.buses.update');
    Route::delete('/admin/buses/{id}', [BusController::class, 'destroy'])->name('admin.buses.destroy');

    // Trips 
    Route::get('/trips', [TripController::class, 'index'])->name('trips.index');
    Route::post('/trips', [TripController::class, 'store'])->name('trips.store');
    Route::get('/trips/{trip}/edit', [TripController::class, 'edit'])->name('trips.edit');
    Route::put('/trips/{trip}', [TripController::class, 'update'])->name('trips.update');
    Route::delete('/trips/{id}', [TripController::class, 'destroy'])->name('trips.destroy');

});

