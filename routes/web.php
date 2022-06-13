<?php

use App\Supplier;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

/*
Route::get('/', function () {
    return view('welcome');
});*/

Route::resource('/medicines', 'MedicineController');

Route::resource('/category', 'CategoryController');

Route::get('/medicines', 'MedicineController@index')->name("medicine.index");
Route::get('/medicines/{medicine}', 'MedicineController@show');
Route::get('/medicines2/{medicine}', 'MedicineController@show2')->name('medicines2.show');


Route::get('/coba1', 'MedicineController@coba1');

Route::get('/data', 'DataController@show');
Route::get('/report/listmedicine/{id}', 'CategoryController@showlist');

Route::get('/report/highestPrice', 'DataController@highestPrice');

Route::resource("supplier", "SupplierController");

Route::resource('transaction', 'TransactionController');

Route::get('/','MedicineController@front_index');
Route::get('cart','MedicineController@cart');
Route::get('add-to-cart/{id}','MedicineController@addToChart');

Route::get('/checkout', 'TransactionController@form_submit_front')->middleware(['auth']);
Route::get('/submit_checkout', 'TransactionController@submit_front')->name('submitcheckout')->middleware(['auth']);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('transaction/show/{id}', 'TransactionController@show1');
    Route::post('transaction/showDataAjax/', 'TransactionController@showAjax')->name('transaction.showAjax');
    Route::get('transaction/showDataAjax2/{id}', 'TransactionController@showAjax2')->name('transaction.showAjax2');

    Route::get('/medicines/create', 'MedicineController@create')->name('medicines.create');
    Route::post('/medicines', 'MedicineController@store');
    Route::post('/medicines/showInfo', 'MedicineController@showInfo')->name('medicines.showInfo');
    Route::post('/medicine/getEditForm', 'MedicineController@getEditForm')->name('medicine.getEditForm');
    Route::delete("medicine/{medicine}", "MedicineController@destroy");
    Route::post('/medicine/savefield', 'MedicineController@saveDataField')->name('medicine.saveDataField');
    Route::post('/medicine/changeImage', 'MedicineController@changeImage')->name('medicine.changeImage');

    Route::get("supplier/create", "SupplierController@create");
    Route::put("supplier/{supplier}/edit", "SupplierController@edit");

    Route::post('/supplier/getEditForm', 'SupplierController@getEditForm')->name('supplier.getEditForm');
    Route::post('/supplier/getEditForm2', 'SupplierController@getEditForm2')->name('supplier.getEditForm2');
    Route::post('/supplier/saveData', 'SupplierController@saveData')->name('supplier.saveData');
    Route::post('/supplier/deleteData', 'SupplierController@deleteData')->name('supplier.deleteData');
    Route::put("supplier/{supplier}", "SupplierController@update");
    Route::delete("supplier/{supplier}", "SupplierController@destroy");
    Route::post('/supplier/savefield', 'SupplierController@saveDataField')->name('supplier.saveDataField');
    Route::post('/supplier/changeLogo', 'SupplierController@changeLogo')->name('supplier.changeLogo');
});
