<?php

use App\Http\Controllers\DeveloperController;
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
    return redirect(url('login'));
});

// Auth::routes();

Route::get('/login', 'UserController@login')->name('login');
Route::post('/login', 'UserController@proceedLogin')->name('admin.login.proceed');

Route::group(['middleware' => ['authenticaion']], function () {
    Route::get('logout', 'UserController@logout')->name('logout');
    Route::get('/home', 'HomeController@index')->name('home');

    Route::group(['prefix' => 'users'], function () {
        Route::get('/', 'UserController@userList')->name('admin.user.list');
        Route::get('create', 'UserController@createUser')->name('admin.user.create');
        Route::post('create', 'UserController@addUser')->name('admin.user.store');
        Route::get('edit/{id}', 'UserController@editUser')->name('admin.user.edit');
        Route::post('update', 'UserController@update')->name('admin.user.update');
        Route::get('delete/{id}', 'UserController@delete')->name('admin.user.delte');
    });

    Route::group(['prefix' => 'admin'], function () {
        Route::get('/', 'AdminController@adminList')->name('admin.admin.list');
        Route::get('create', 'AdminController@create')->name('admin.admin.create');
        Route::post('create', 'AdminController@store')->name('admin.admin.store');
        Route::get('edit/{id}', 'AdminController@edit')->name('admin.admin.edit');
        Route::get('delete/{id}', 'AdminController@deleteAdmin')->name('admin.admin.admin');
    });

    Route::resource('developer', 'DeveloperController');
    Route::get('developer/delete/{id}', 'DeveloperController@deleteDeveloper')->name('developer.dlt');
    Route::get('developers/payout', 'DeveloperTransactionsController@index')->name('developer.payout.index');


    Route::resource('category', 'CategoryController');
    Route::get('category/delete/{id}', 'CategoryController@deleteCategory')->name('category.dlt');

    Route::resource('subcategory', 'SubCategoryController');
    Route::get('subcategory/delete/{id}', 'SubCategoryController@deleteSubcategory')->name('sub.category.dlt');

    Route::resource('notifications', 'NotificationsController');

    Route::resource('promocodes', 'PromoCodeController');
    Route::get('promocodes/delete/{id}', 'PromoCodeController@destroyPromo')->name('promo.code.dlt');

    Route::resource('support', 'SupportController');
    Route::get('support/delete/{id}', 'SupportController@destroySupport')->name('support.dlt');

    Route::resource('product', 'ProductController');
    Route::get('product/delete/{id}', 'ProductController@destroyProduct')->name('product.dlt');

    Route::resource('roomtemplate', 'RoomTemplateController');
    Route::get('roomtemplate/delete/{id}', 'RoomTemplateController@destroyTempalte')->name('roomtemplate.dlt');

    Route::resource('reviewrating', 'ReviewRatingController');


    // Route::resource('roomtempaltetransactions', 'RoomTemplateTransactionsController');
    Route::get('roomtempaltetransactions/{id}', 'RoomTemplateTransactionsController@index')->name('room.tempate.transactions.index');

    Route::get('product/transaction/{id}', 'ProductTransactionsController@index')->name('product.transactions.index');

    Route::resource('subscription', 'SubscriptionController');
    Route::get('subscription/delete/{id}', 'SubscriptionController@destroySub')->name('subscription.dlt');
    Route::get('subscriptions/transactions', 'SubscriptionTransactionsController@index')->name('subscription.transactions');
});
