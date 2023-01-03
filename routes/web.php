<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CaptchaServiceController;
use App\Http\Controllers\UploadFileController;
use App\Http\Controllers\AudioController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/product', [ProductController::class, 'index'])->name('product.show');
    
    Route::get('/pgp_check', [PgpController::class, 'index'])->name('auth.pgp_check');
});

Route::get('/contact-form', [CaptchaServiceController::class, 'index']);
Route::post('/captcha-validation', [CaptchaServiceController::class, 'capthcaFormValidate']);
Route::get('/reload-captcha', [CaptchaServiceController::class, 'reloadCaptcha']);

Route::get('/xml',[UploadFileController::class, 'index'])->name('xml');
Route::post('/xml',[UploadFileController::class, 'showUploadFile']);

Route::get('/audio',[AudioController::class, 'index'])->name('audio');

require __DIR__.'/auth.php';
