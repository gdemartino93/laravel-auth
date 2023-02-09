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

Route::post('/product/addnew', [MainController :: class , 'store'])
->middleware(['auth','verified']) ->name('product.store');

Route::get('/dashboard',[MainController :: class, 'dashBoard'])
    ->name('dashboard');

Route::get('product/delete/{product}', [MainController :: class , 'deleteProduct'])
    ->middleware(['auth','verified'])->name('product.delete');

// redirect edit prodotto
Route::get('product/edit/{product}', [MainController :: class ,'redirectEditProduct'])
    ->middleware(['auth','verified'])->name('product.redirectedit');

Route::post('product/edit/{product}',[MainController :: class, 'editProduct'])
    ->middleware(['auth','verified']) ->name('product.edit');

Route::get('product/single/{product}',[MainController :: class, 'single'])
    ->name('singleProduct');
    
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__.'/auth.php';
