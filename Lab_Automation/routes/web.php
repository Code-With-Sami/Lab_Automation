<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class, 'index']);
Route::get('about-us', [UserController::class, 'about']);
Route::get('contact-us', [UserController::class, 'contact']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/admin-dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('admin.dashboard');

Route::get('/tester-dashboard', [TestController::class, 'index']);

Route::middleware('auth')->group(function () { 
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Admin Panel Routes :-
    Route::get('show-product', [AdminController::class, 'showProduct']);
    Route::get('create-product', [AdminController::class, 'createProduct']);
    Route::post('store-product', [AdminController::class, 'storeProduct']);
    Route::get('edit-product/{id}', [AdminController::class, 'editProduct']);
    Route::post('update-product/{id}', [AdminController::class, 'updateProduct']);
    Route::get('delete-product/{id}', [AdminController::class, 'deleteProduct']);

    // Tester Panel Route:
    Route::get('/show-tests', [TestController::class, 'index'])->name('tests.index'); // List Tests
    Route::get('/create-tests', [TestController::class, 'createTest'])->name('tests.create'); // Show Create Form
    Route::post('/store-tests', [TestController::class, 'store'])->name('tests.store'); // Store New Test
    Route::get('/tests/{id}/edit', [TestController::class, 'edit'])->name('tests.edit');
    Route::put('/tests/{test_id}', [TestController::class, 'updateTest'])->name('tests.update'); // Update Test
    Route::delete('/delete-tests/{id}', [TestController::class, 'destroy'])->name('tests.destroy'); // Delete Test

    // User panel test route
    Route::post('/submit-test', [UserController::class, 'submitTest'])->name('submit.test');
    Route::get('/my-tests', [UserController::class, 'myTests'])->name('user.tests');


});

require __DIR__.'/auth.php';
