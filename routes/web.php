
<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\ContactController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Página principal
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Rutas CRUD
Route::resource('operators', OperatorController::class);
Route::resource('companies', CompanyController::class);
Route::resource('groups', GroupController::class);
Route::resource('contacts', ContactController::class);
