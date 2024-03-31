<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StopageController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FeesController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\VehicleStopageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified']);

Route::get('/online-admission', [StudentController::class, "create"]);
Route::post('/check-seat', [StudentController::class, "check_seat"])->name('check_seat')->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified']);

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('stopages', StopageController::class);
    Route::resource('vehicles', VehicleController::class);
    Route::resource('students', StudentController::class);
    Route::resource('fees', FeesController::class);
    Route::resource('discounts', DiscountController::class);

    Route::get('vehicle-stopages/get-vehicle-stopages/{id}', [VehicleStopageController::class, "get_vehicle_stopages"]);
    Route::resource('vehicle-stopages', VehicleStopageController::class);
    
    
    // User Routes
    Route::get("/users", [UserController::class, "index"])->name("users");
    Route::get("/users/create", [UserController::class, "create"])->name("users.create");
    Route::get("/users/edit", [UserController::class, "edit"])->name("users.edit");
    Route::post("/users/update", [UserController::class, "update"])->name("users.update");
    Route::post("/users/store", [UserController::class, "store"])->name("users.store");
    Route::get("/users-activate/{user_id}", [UserController::class, "active"])->name("users.active");
    Route::get("/users-deactivate/{user_id}", [UserController::class, "deactive"])->name("users.deactive");
    
    Route::get("/permission-manager/{user_id}", [UserController::class, "get_permission_manager"])->name("users.get_permission_manager");
    Route::post("/permission-manager", [UserController::class, "store_permission_manager"])->name("users.store_permission_manager");
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';