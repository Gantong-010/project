<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;
use App\Http\Controllers\ChartJsController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OtherControll;
use App\Http\Controllers\RiceDateController;
use App\Http\Controllers\RiceDateViewController;
use App\Http\Controllers\RicePriceController;
use App\Http\Controllers\SaveMoneyController;
use App\Http\Controllers\SaveMoneyViewController;

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

// Page home 
Route::get('/', function () {
    return view('register.login');
});

Route::get('home', function () {
    return view('home.home');
})->name('home');
Route::prefix('home')->group(function () {
    Route::view('home', 'home.home')->name('home');
});
//Registrations
Route::get('/login', [AuthManager::class, 'login'])->name('login');
Route::post('/login', [AuthManager::class, 'loginPost'])->name('login.post');
Route::get('/registration', [AuthManager::class, 'registration'])->name('registration');
Route::post('/registration', [AuthManager::class, 'registrationPost'])->name('registration.post');
Route::get('/logout', [AuthManager::class, 'logout'])->name('logout');


//Chart Js กราฟ
Route::get('home', [ChartJsController::class, 'chartjshome']);
Route::get('home/home', [ChartJsController::class, 'chartjshome'])->name('home');




//Page customer  
Route::prefix('customer')->group(function () {
    Route::view('customer', 'customer.customer')->name('customer');
    Route::view('customer-add', 'customer.customer-add')->name('customer-add');
    Route::view('customer-edit', 'customer.customer-edit')->name('customer-edit');
    // Route::get('editCustomer/{id}', [CustomerController::class, 'editCustomer'])->name('editCustomer');
});
//Show data Customer
Route::get('customer', [CustomerController::class, 'customerdata'])->name('customer');
//Form Customer
Route::post('insertCustomer', [CustomerController::class, 'insertCustomer'])->name('insertCustomer');
//Edit Customer
Route::get('editCustomer/{id}', [CustomerController::class, 'editCustomer'])->name('editCustomer');
//Update Customer
Route::post('updateCustomer/{id}', [CustomerController::class, 'updateCustomer'])->name('updateCustomer');
//Delete Customer
Route::get('deleteCustomer/{id}', [CustomerController::class, 'deleteCustomer'])->name('deleteCustomer');



//Page manege-price
Route::prefix('manage-price')->group( function(){
    Route::view('manage-price', 'manage.manage-price')->name('manage-price');
    Route::get('manage-price', [RicePriceController::class, 'ricepricedata'])->name('manage-price');
    Route::view('manage-price-add', 'manage.manage-price-add')->name('manage-price-add');
    Route::get('manage-price-add', [RicePriceController::class, 'customerdata'])->name('manage-price-add');
    Route::view('manage-price-edit', 'manage.manage-price-edit')->name('manage-price-edit');
});
//Form RicePrice
Route::post('insertRiceprice', [RicePriceController::class, 'insertRiceprice'])->name('insertRiceprice');
//Edit RicePrice
Route::get('editRiceprice/{id}', [RicePriceController::class, 'editRiceprice'])->name('editRiceprice');
//Update RicePrice
Route::post('updateRiceprice/{id}', [RicePriceController::class, 'updateRiceprice'])->name('updateRiceprice');
//Delete RicePrice
Route::get('deleteRiceprice/{id}', [RicePriceController::class, 'deleteRiceprice'])->name('deleteRiceprice');




//Page savetheday
Route::prefix('savetheday')->group( function(){
    Route::view('savetheday', 'savetheday.savetheday')->name('savetheday');
    Route::get('savetheday', [RiceDateController::class, 'ricedatedata'])->name('savetheday');
    Route::view('savetheday-add', 'savetheday.savetheday-add')->name('savetheday-add');
    Route::get('savetheday-add', [RiceDateController::class, 'customerdata'])->name('savetheday-add');
    Route::view('savetheday-edit', 'savetheday.savetheday-edit')->name('savetheday-edit');
    Route::view('savetheday-bill', 'savetheday.savetheday-bill')->name('savetheday-bill');
});
//Form Savetheday
Route::post('insertRicedate', [RiceDateController::class, 'insertRicedate'])->name('insertRicedate');
//Edit RiceDate
Route::get('editRicedate/{id}', [RiceDateController::class, 'editRicedate'])->name('editRicedate');
//Update RiceDate
Route::post('updateRicedate/{id}', [RiceDateController::class, 'updateRicedate'])->name('updateRicedate');
//Delete 
Route::get('deleteRicedate/{id}', [RiceDateController::class, 'deleteRicedate'])->name('deleteRicedate');



//Page savemoney
Route::prefix('savemoney')->group(function () {
    Route::view('savemoney', 'savemoney.savemoney')->name('savemoney');
    Route::get('savemoney', [SaveMoneyController::class, 'savemoneydata'])->name('savemoney');
    Route::view('savemoney-add', 'savemoney.savemoney-add')->name('savemoney-add');
    Route::get('savemoney-add', [SaveMoneyController::class, 'savemoneyAddData'])->name('savemoney-add');
    Route::view('savemoney-bill', 'savemoney.savemoney-bill')->name('savemoney-bill');
});
//Form SaveMoney
Route::post('insertSavemoney', [SaveMoneyController::class, 'insertSavemoney'])->name('insertSavemoney');
//Edit SaveMoney
Route::get('editSavemoney/{id}', [SaveMoneyController::class, 'editSavemoney'])->name('editSavemoney');
//Update SaveMoney
Route::post('updateSavemoney/{id}', [SaveMoneyController::class, 'updateSavemoney'])->name('updateSavemoney');
//Delete Savemoney
Route::get('deleteSavemoney/{id}', [SaveMoneyController::class, 'deleteSavemoney'])->name('deleteSavemoney');
//Detail Savemoney
Route::get('billSavemoney/{id}', [SaveMoneyController::class, 'billSavemoney'])->name('billSavemoney');



//Bill Ricedate to ricedate
Route::get('ricedatedetail/{id}', [RiceDateViewController::class, 'ricedatedetail'])->name('ricedatedetail');
//Bill Ricedate to savemoney
Route::get('savemoneydetail/{id}', [SaveMoneyViewController::class, 'savemoneydetail'])->name('savemoneydetail');











// page customer 
// Route::get('customer', function() {
//     return view('customer.customer');
// })->name('customer');
// Route::get('customer-add', function() {
//     return view('customer.customer-add');
// })->name('customer-add');
// Route::get('customer-edit', function() {
//     return view('customer.customer-edit');
// })->name('customer-edit');
// page customer 


//Page manage-price
// Route::get('manage-price', function() {
//     return view('manage.manage-price');
// })->name('manage-price');
// Route::get('manage-price-add', function() {
//     return view('manage.manage-price-add');
// })->name('manage-price-add');
// Route::get('manage-price-edit', function() {
//     return view('manage.manage-price-edit');
// })->name('manage-price-edit');