<?php

use App\Livewire\Guest;
use Illuminate\Support\Facades\Route;
use App\Livewire\Admindashboard;
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

Route::get('/',Guest::class);
Route::get('/admindashboard',Admindashboard::class);
Route::get('/additem',Additem::class);
Route::get('/register',Register::class);
Route::get('/login',Login::class);

