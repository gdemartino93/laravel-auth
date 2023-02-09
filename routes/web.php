<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
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

Route::get('/', [MainController::class , "home"])
    ->name('home');


Route::get('/privateSection', [MainController :: class, 'sezionePrivata']) 
    -> name('sezione-privata');
// redirect to addproduct pages
Route::get('/product/addnew', [MainController :: class , 'createNew'])
    ->middleware(['auth', 'verified'])->name('createNew');
    // ----------------------------------------------------------------------------------------
    // !                                                                                      !
    // ! Devo inserire middleware sia al post che al get anche se la rotta è la stessa?       !
    // !                                                                                      !
    // -----------------------------------------------------------------------------------------
Route::post('/product/addnew', [MainController :: class , 'store'])
    ->name('product.store');

Route::get('/dashboard',[MainController :: class, 'dashBoard'])
    ->name('dashboard');
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
