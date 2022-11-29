<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PhotoController;

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
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/photos',[PhotoController::class,'index'])->name('photos.index');
Route::get('/photos/{photo}',[PhotoController::class,'show'])->name('photos.show');
Route::post('/photos',[PhotoController::class,'store'])->name('photos.store');
Route::patch('/photos/{photo}',[PhotoController::class,'update'])->name('photos.update');
Route::delete('/photos/{photo}',[PhotoController::class,'destroy'])->name('photos.destroy');