<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;

use App\Http\Controllers\HomeController;

route::get('/', [HomeController::class,'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// ================== Handle Routes Manage Menu Sell =========================
Route::get('/manage/sell', [MenuController::class, 'index'])->name("manage_menu_sell.index");
Route::get('/manage/sell/create', [MenuController::class, 'create'])->name("manage_menu_sell.create");
Route::post('/manage/sell/store', [MenuController::class, 'store'])->name("manage_menu_sell.store");
Route::get('/manage/sell/{menu}', [MenuController::class, 'edit'])->name("manage_menu_sell.edit");
Route::put('/manage/sell/{menu}', [MenuController::class, 'update'])->name("manage_menu_sell.update");
Route::delete('/manage/sell/destroy/{menu}',
[MenuController::class, 'destroy'])->name('manage_menu_sell.destroy');


// ================== Handle Routes Manage Menu Sell =========================
route::get('/redirect', [HomeController::class,'redirect'])->name('redirect');
Route::get('/product_details/{id}', [HomeController::class, 'product_details']);
