<?php

use App\Livewire\Adminhomepage;
use App\Livewire\Allwatches;
use App\Livewire\Directorder;
use App\Livewire\Guesthome;
use App\Livewire\Singlewatchview;
use Illuminate\Support\Facades\Route;
use App\Livewire\Additem;
use App\Livewire\Register;
use App\Livewire\Login;

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

Route::get('/',Guesthome::class);
Route::get('/register',Register::class);
Route::get('/login',Login::class)->name('login');
Route::get('/singlewatch/{id}',Singlewatchview::class);
Route::get('/allwatches',Allwatches::class);
Route::get('/directorder/{id}',Directorder::class);

Route::middleware(['auth','admin'])->group(function () {
 Route::get('/admindashboard',Adminhomepage::class);
 Route::get('/additem',Additem::class);
});