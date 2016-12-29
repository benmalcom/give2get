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


Route::get('/','HomeController@index');

Route::get('/home', function () {
    return response()->redirectTo('/');
});

Auth::routes();


Route::get('/activate-account','UserController@getActivateAccount');
Route::post('/activate-account','UserController@postActivateAccount');

Route::resource('reviews', 'ReviewController');
Route::resource('users', 'UserController');
Route::resource('user-types', 'UserTypeController');

Route::resource('transactions', 'TransactionController');


Route::group(['prefix' => 'a','middleware'=>['auth','admin']], function () {
    Route::get('dashboard','AdminController@getDashboard');

    Route::get('categories','AdminController@getCategories');
    Route::post('categories','AdminController@postCategories');
    Route::get('categories/{hashed_id}/delete','AdminController@deleteCategory');
    Route::get('categories/{hashed_id}/edit','AdminController@editCategory');
    Route::post('items/categories','AdminController@postEditCategory');

    Route::get('items','AdminController@getItems');
    Route::get('items/{hashed_id}/delete','AdminController@deleteItem');

    Route::get('users','AdminController@getUsers');
    Route::get('users/{hashed_id}/delete','AdminController@deleteUser');

    Route::get('transactions','AdminController@getTransactions');
});

Route::group(['middleware'=>'auth'],function(){
    Route::get('items/add', 'ItemController@create');
    Route::post('items/add', 'ItemController@store');
    Route::get('items/{hashed_id}/edit', 'ItemController@edit');
    Route::get('items/{hashed_id}/delete', 'ItemController@destroy');
    Route::post('items/update', 'ItemController@update');

    Route::get('/profile', 'UserController@getProfile');
    Route::post('/profile', 'UserController@postProfile');
    Route::post('/profile/avatar', 'UserController@postAvatar');

    Route::get('/change-password', 'UserController@getChangePassword');
    Route::post('/change-password', 'UserController@postChangePassword');

    Route::get('/my-transactions', 'UserController@getUserTransactions');
    Route::get('/my-items', 'UserController@getUserItems');

});

////////////////Routes needing no user auth///////////////////////////
Route::get('items/{hashed_id}/details', 'ItemController@show');
Route::get('categories/{hashed_id}/items', 'ItemController@getItemsByCategory');
Route::get('/search', 'ItemController@getItemSearchResult');