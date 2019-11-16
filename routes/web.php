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

Auth::routes();

Route::get('/', function () {
    return redirect('/tours');
});

Route::get('/account', function () {
    return view('/account');
    /* dd(auth()->user()->voucher); */
})->middleware('auth');

Route::get('/tours', 'TourController@index');
Route::post('/tours', 'TourController@filter');
Route::get('/tours/{tour}', 'TourController@card');
Route::post('/tours/{tour}', 'TourController@order')->name('tours.order')->middleware('auth');


Route::middleware(['auth', 'is_manager_or_admin'])->group(function () {
    Route::get('/admin/vouchers', 'AdminController@vouchers');
    Route::put('/admin/vouchers/{voucher}/{status}', 'AdminController@setStatus');

    Route::put('/tours/{tour}', 'TourController@update');
    Route::delete('/tours/{tour}', 'TourController@destroy')->name('tours.destroy');
});


Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/admin', function () {
        return redirect('/admin/vouchers');
    });

    Route::get('/admin/users', 'AdminController@users');
    Route::post('/admin/users/{user}', 'AdminController@ban');

    Route::get('/admin/addTour', 'AdminController@showTourForm');
    Route::post('/admin/addTour', 'AdminController@addTour')->name('tours.add');

    Route::get('/admin/addHotel', 'AdminController@showHotelForm');
    Route::post('/admin/addHotel', 'AdminController@addHotel');
});
