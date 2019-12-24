<?php

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
// rute za stranice
Route::get('/', 'PagesController@getHome');
Route::get('/about', 'PagesController@getAbout');
Route::get('/treatment', 'PagesController@getTreatment');
Route::get('/contact', 'PagesController@getContact');
Route::get('treatment/{id}', 'UserController@show');

Auth::routes();

// rute za korisnike
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/galery', 'UsersController@index');
Route::get('/treatment', 'TreatmentsController@index');
Route::resource('services', 'TreatmentsController');
Route::get('/show/{id}','TreatmentsController@show');
Route::get('/showscheduling','ReservationsController@index');
Route::resource('client/reservation', 'ReservationsController');
Route::resource('client/voucher', 'VouchersController');


// rute za admina
Route::get('admin/routes', 'HomeController@admin')->middleware('admin');
Route::get('/showtreatmen', 'AdminTreatmentsController@index')->middleware('admin');
Route::get('/showemployes', 'EmployesController@index')->middleware('admin');
Route::get('/message', 'MessageController@index')->middleware('admin');
Route::get('/vouchers', 'VouchersController@index')->middleware('admin');
Route::get('/showreservations', 'AdminReservationsController@index')->middleware('admin');
Route::resource('admin/services', 'AdminTreatmentsController');
Route::resource('admin', 'EmployesController');
Route::resource('client', 'MessageController');
Route::resource('reservations', 'AdminReservationsController');

// ruta za promenu lozinke
Route::get('/changePassword','HomeController@showChangePasswordForm');
Route::post('/changePassword','HomeController@changePassword')->name('changePassword');
