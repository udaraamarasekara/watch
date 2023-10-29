<?php

use App\Livewire\EditSingleWatch;
use App\Livewire\EditSingleWatchImages;
use App\Livewire\Homepage;
use App\Livewire\Allwatches;
use App\Livewire\Directorder;
use App\Livewire\Guesthome;
use App\Livewire\Singlewatchview;
use App\Livewire\Suggessions;
use Illuminate\Support\Facades\Route;
use App\Livewire\Additem;
use App\Livewire\Register;
use App\Livewire\Login;
use App\Livewire\Singlewatchguest;
use App\Livewire\AddComment;

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
Route::get('/singlewatchguest/{id}',Singlewatchguest::class);

Route::get('/allwatches',Allwatches::class);
Route::get('/directorder/{id}',Directorder::class);
Route::get('/dashboard',Homepage::class);
Route::get('/search',Suggessions::class);


Route::middleware(['auth','admin'])->group(function () {
 Route::get('/additem',Additem::class);
 Route::get('/editsinglewatch/{id}',EditSingleWatch::class);
 Route::get('/editsinglewatchimage/{id}',EditSingleWatchImages::class);

});

Route::middleware('auth')->group(function () {
    Route::get('/addcomment',AddComment::class);
});