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

Route::get('/aboutus', function () {
    return view('aboutus');
});

Route::get('/contactus', function () {
    return view('contactus');
});

//Admin.Cellphones
Route::get('/admin/cellphones', 'CellphonesController@Index');

Route::get('/admin/cellphones/create', 'CellphonesController@Create');

Route::post('/admin/cellphones/create', 'CellphonesController@Store');

Route::get('/admin/cellphones/edit/{id}', 'CellphonesController@Edit');

Route::post('/admin/cellphones/edit', 'CellphonessController@Update');

Route::get('/admin/cellphones/delete/{id}', 'CellphonesController@Delete');

Route::delete('/admin/cellphones/delete', 'CellphonesController@Remove');

Route::get('/admin/cellphones/{id}', 'CellphonesController@Show');

//CellphonesStore
Route::get('cellphones', 'CellphonesController@CellphoneStore')->name('CellphoneStore');

Route::get('cellphones', 'CellphonesController@Details')->name('CellphoneDetails');

Route::get('/mongodb', function () {
    return view('mongodb');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
