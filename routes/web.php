<?php

use App\Http\Controllers\ConsultationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\GroomServicesController;
use App\Http\Controllers\PetController;


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
})->name('welcome');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/customer/import', [App\Http\Controllers\CustomerController::class, 'import'])->name('customerImport');
Route::post('/employee/import', [App\Http\Controllers\EmployeeController::class, 'import'])->name('employeeImport');
Route::post('/pet/import', [App\Http\Controllers\PetController::class, 'import'])->name('petImport');
Route::post('/groomservices/import', [App\Http\Controllers\GroomServicesController::class, 'import'])->name('groomserviceImport');
// Route::post('/customer/import', 'CustomerController@import')->name('artistImport');

Route::get('pchart', [App\Http\Controllers\ChartController::class, 'index'])->name('pchart');
Route::get('cchart', [App\Http\Controllers\ChartController::class, 'cindex'])->name('cchart');

// Route::get('explore', [App\Http\Controllers\ExploreController::class, 'index'])->name('explore');
// Route::get('/explore/{id}', [App\Http\Controllers\ExploreController::class, 'moreinfo'])->name('moreinfo');
// Route::post('/explore/{id}', [App\Http\Controllers\ExploreController::class, 'newcomment'])->name('newcomment');

Route::get('pethistory', [App\Http\Controllers\TransactionController::class, 'index'])->name('pHistory');
Route::get('chistory', [App\Http\Controllers\TransactionController::class, 'cindex'])->name('cHistory');
Route::post('search', [App\Http\Controllers\TransactionController::class, 'search'])->name('search');
Route::post('csearch', [App\Http\Controllers\TransactionController::class, 'csearch'])->name('csearch');


Route::resource('pet', PetController::class)->except(['index', 'show']);

Route::group(['middleware' => ['auth','role:admin,employee']], function () {

    Route::get('/customers', [App\Http\Controllers\CustomerController::class, 'getCustomer'])->name('getCustomer');
    Route::resource('customer', CustomerController::class)->except(['index', 'show']);

    Route::get('/pets', [App\Http\Controllers\PetController::class, 'getPet'])->name('getPet');
    

    Route::get('/employees', [App\Http\Controllers\EmployeeController::class, 'getEmployee'])->name('getEmployee');
    Route::resource('employee', EmployeeController::class)->except(['index', 'show']);

    Route::get('/groomservices', [App\Http\Controllers\GroomServicesController::class, 'getGservice'])->name('getGservice');
    Route::get('/groomservices/deleteimage/{id}',[App\Http\Controllers\GroomServicesController::class,'deleteimage'])->name('deleteimage');
    Route::resource('groomservices', GroomServicesController::class)->except(['index', 'show']);

});

Route::group(['middleware' => ['auth','role:admin, vet']], function () {

    Route::get('consult', [App\Http\Controllers\ConsultationController::class, 'index']);
    Route::post('consults', [App\Http\Controllers\ConsultationController::class, 'dropdowns']);
    Route::post('consultation/store', [App\Http\Controllers\ConsultationController::class, 'store']) ->name('consultStore');

});

Route::get('/myprofile', [App\Http\Controllers\CustomerController::class, 'getProfile'])->name('getProfile');
Route::get('/myprofile/{id}/edit', [App\Http\Controllers\CustomerController::class, 'editProfile'])->name('editProfile');
Route::put('/myprofile/{id}', [App\Http\Controllers\CustomerController::class, 'updateProfile'])->name('updateProfile');


Route::group(['middleware' => ['auth']], function () {
    Route::get('explore', [App\Http\Controllers\ExploreController::class, 'index'])->name('explore');
    Route::get('/explore/{id}', [App\Http\Controllers\ExploreController::class, 'moreinfo'])->name('moreinfo');
    Route::post('/explore/{id}', [App\Http\Controllers\ExploreController::class, 'newcomment'])->name('newcomment');
    Route::get('receipt', [App\Http\Controllers\TransactionController::class, 'getReceipt'])->name('receipt');
    Route::get('transactions', [App\Http\Controllers\TransactionController::class, 'getTransac'])->name('transactions');
    Route::put('/transactions/{id}', [App\Http\Controllers\TransactionController::class, 'editpaid'])->name('editpaid');

    Route::get('add-to-cart/{id}', [
        'uses' => 'TransactionController@getAddToCart',
        'as' => 'item.addToCart',
    ]);

    Route::get('shopping-cart', [
        'uses' => 'TransactionController@getCart',
        'as' => 'item.shoppingCart'
    ]);

    Route::get('remove/{id}',[
        'uses'=>'TransactionController@getRemoveItem',
        'as' => 'item.remove'
    ]);

    Route::get('reduce/{id}',[
        'uses' => 'TransactionController@getReduceByOne',
        'as' => 'item.reduceByOne'
    ]);

    Route::get('checkout',[
        'uses' => 'TransactionController@postCheckout',
        'as' => 'checkout',
        'middleware' =>'auth'
    ]);

    Route::get('shopping-cart', [
        'uses' => 'TransactionController@getCart',
        'as' => 'item.shoppingCart'
    ]);

});

