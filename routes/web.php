<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\registercontroller;
use App\Http\Controllers\forgetcontroller;
use App\Http\Controllers\logincontroller;
use App\Http\Controllers\AddProductsController;

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

// Route::get('/', function () {
//     return view('login');
// });
// Route::get('reg', function () {
//     return view('register');
// });
// Route::get('for', function () {
//     return view('forget');
// });

Route::get('/reg', [registercontroller::class, 'showRegistrationForm']);
Route::post('/reg', [registercontroller::class, 'register']);



Route::get('/for', [forgetcontroller::class, 'index']);
Route::post('/for', [forgetcontroller::class, 'forget']);


//for adding products
Route::get("/addpro",[AddProductsController::class,'products']);

// routes/web.php
//use App\Http\Controllers\LoginController;

Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/', [LoginController::class, 'login']);

Route::get('/int', [LoginController::class, 'logintableabc']);

Route::get('/rega', [registercontroller::class, 'registertableabc']);

Route::put('/login/{id}', 'logincontroller@update');



//login -- delete from database

// Route::post('/data/{id}', [logincontroller::class,'destroy'])->name('deleteitems');
Route::post('/data/{id}', [logincontroller::class, 'destroy'])->name('deleteitems');






//login -- update from database

Route::post('/data/{id}', [logincontroller::class,'update'])->name('updateitems');
