<?php

use Illuminate\Support\Facades\Route;

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


Route::resource('userstype', "userstypecontroller");

Route::resource('users', "userscontroller");
// ->middleware('chekAuth');

//login//
Route::get('login',"userscontroller@login")->name('login');
//action for login//
Route::post('dologin',"userscontroller@dologin");
//logout//
Route::get('logout',"userscontroller@logout");



//table appointments//
Route::resource('appointments', "appointmentscontroller");


//table reservation//

Route::resource('reservation', "reservationcontroller");

//dashboard//

Route::get('/admin', function () {
    return view('index');
});

Route::get('/proj', function () {
    return view('proj');
});




