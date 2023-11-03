<?php

use App\Livewire\EditSingleWatch;
use App\Livewire\EditSingleWatchImages;
use App\Livewire\Homepage;
use App\Livewire\Allwatches;
use App\Livewire\Directorder;
use App\Livewire\Guesthome;
use App\Livewire\Paidorders;
use App\Livewire\Singleorderguest;
use App\Livewire\Singlewatchview;
use App\Livewire\Suggessions;
use App\Livewire\Userorders;
use Illuminate\Support\Facades\Route;
use App\Livewire\Additem;
use App\Livewire\Register;
use App\Livewire\Login;
use App\Livewire\Singlewatchguest;
use App\Livewire\AddComment;
use App\Http\Controllers\respController;
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

Route::get('/paymentSuccess',[respController::class,'success'])->name('success');
Route::get('/paymentCancel',[respController::class ,'cancel'] )->name('cancel');
Route::get('/',Guesthome::class);
Route::get('/register',Register::class);
Route::get('/login',Login::class)->name('login');
Route::get('/singlewatch/{id}',Singlewatchview::class);
Route::get('/singlewatchguest/{id}',Singlewatchguest::class);
Route::middleware('orderaccess')->get('/singleorderguest/{id}',Singleorderguest::class);


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
    Route::get('/userorders',Userorders::class);
    Route::get('/addcomment',AddComment::class);
    Route::get('/paidorders',Paidorders::class);
    Route::get('/paymentSuccessLoged',[respController::class,'successloged'])->name('successloged');
    Route::get('/paymentCancelLoged',[respController::class ,'cancelloged'] )->name('cancelloged'); 

});