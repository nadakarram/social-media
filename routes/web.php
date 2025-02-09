<?php

use App\Livewire\Auth\GetEmail;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Passwordrest;
use App\Livewire\Auth\Regester;
use App\Livewire\Home;
use App\Livewire\PasswordChanged;
use App\Livewire\Postimages;
use App\Livewire\Profile;
use App\Livewire\Profileedit;
use App\Livewire\ProfileEdting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
Route::middleware('auth')->group(function () {

    Route::get("/logout", function () {
      Auth::logout();
  
      return redirect('/login');
  
    });
    Route::get('/',Home::class);
    Route::get("/profile",Profile::class);

    Route::get("/postimage",Postimages::class);
    Route::get("/profileedit/{user}",Profileedit::class);
});  
Route::middleware("guest")->group(function () {
    Route::get('/signup', Regester::class)->name("regester");
    Route::get('/login', Login::class)->name("login");
    Route::get("/changepassword/{email}", Passwordrest::class);
    Route::get("/forgetpassword", GetEmail::class);
    Route::get("/completed", PasswordChanged::class);

  });

