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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'PagesController@getHome');
Route::get('/about', 'PagesController@getAbout');
Route::get('/galery', 'PagesController@getGalery');
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
// Route::get('treatment/{id}', 'UserController@show');


// rute za admina
Route::get('admin/routes', 'HomeController@admin')->middleware('admin');
// Route::get('/edit', 'AdminTreatmentsController@show');
// Route::post('/edit','AdminTreatmentsController@edit')->name('edit');
Route::get('/showtreatmen', 'AdminTreatmentsController@index')->name('admin');
Route::resource('admin/services', 'AdminTreatmentsController');

// ruta za promenu lozinke
Route::get('/changePassword','HomeController@showChangePasswordForm');
Route::post('/changePassword','HomeController@changePassword')->name('changePassword');
