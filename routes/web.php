<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RatingController;


route::get('/', [HomeController::class,'redirect']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// ================== Handle Routes Home =========================
Route::get('/redirect', [HomeController::class,'redirect'])->name('redirect');
Route::get('/product_details/{id}', [HomeController::class, 'product_details']);

// ================== Handle Routes Order =========================
Route::get('/payment', [OrderController::class, 'payment']);
Route::get('/qr', [OrderController::class, 'showQr']);
Route::get('/show_orders', [OrderController::class, 'index'])->name('orders.index');
Route::get('/edit_orders/{order}', [OrderController::class, 'edit'])->name('orders.edit');
Route::put('/udpate_orders/{order}', [OrderController::class, 'update'])->name('orders.update');


// ================== Handle Routes Cart =========================
Route::post('/add_cart/{id}', [CartController::class, 'add_cart']);
Route::get('/show_cart', [CartController::class, 'show_cart'])->name('cart.show');
Route::get('/remove_cart/{id}', [CartController::class, 'remove_cart']);
Route::get('/edit_cart/{id}', [CartController::class, 'edit'])->name('cart.edit');
Route::put('/udpate_cart/{id}', [CartController::class, 'updateCart'])->name('cart.update');

// ================== Handle Routes Manage Menu Sell =========================
Route::get('/manage/sell', [MenuController::class, 'index'])->name("manage_menu_sell.index");
Route::get('/manage/sell/create', [MenuController::class, 'create'])->name("manage_menu_sell.create");
Route::post('/manage/sell/store', [MenuController::class, 'store'])->name("manage_menu_sell.store");
Route::get('/manage/sell/{menu}', [MenuController::class, 'edit'])->name("manage_menu_sell.edit");
Route::put('/manage/sell/{menu}', [MenuController::class, 'update'])->name("manage_menu_sell.update");
Route::delete('/manage/sell/destroy/{menu}',
[MenuController::class, 'destroy'])->name('manage_menu_sell.destroy');

// ================== Handle Routes Admin =========================
Route::get('/users', [AdminController::class, 'users'])->name("users.index");
Route::get('/user/create', [AdminController::class, 'create'])->name("users.create");
Route::post('/users/store', [AdminController::class, 'store'])->name("users.store");
Route::get('/users/{user}', [AdminController::class, 'edit'])->name("users.edit");
Route::put('/users/{user}', [AdminController::class, 'update'])->name("users.update");
Route::delete('/destroy/{user}', [AdminController::class, 'destroy'])->name('users.destroy');

// ================== Handle Routes Rating =========================
Route::get('/rating', [RatingController::class, 'index'])->name("rating.index");
Route::resource('ratings', RatingController::class);





