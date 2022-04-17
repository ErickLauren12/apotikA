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

Route::resource('/medicines','MedicineController');

Route::resource('/category','CategoryController');

Route::get('/medicines/{medicine}','MedicineController@show');
Route::get('/medicines2/{medicine}','MedicineController@show2')->name('medicines2.show');

Route::get('/coba1','MedicineController@coba1');

Route::get('/data','DataController@show');
Route::get('/report/listmedicine/{id}','CategoryController@showlist');

Route::get('/report/highestPrice','DataController@highestPrice');

Route::post('/medicines/showInfo','MedicineController@showInfo')->name('medicines.showInfo');

Route::resource('transaction','TransactionController');

Route::post('transaction/showDataAjax/','TransactionController@showAjax')->name('transaction.showAjax');
Route::get('transaction/showDataAjax2/{id}','TransactionController@showAjax2')->name('transaction.showAjax2');
