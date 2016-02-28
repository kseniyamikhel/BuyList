<?php

//Route::get('/', function () {
//    return view('welcome');
//});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});

Route::get('/', ['as' => 'lists', 'uses' => 'ListsController@index']);
Route::post('/buy', ['as' => 'addBuy', 'uses' => 'ListsController@newBuy']);
Route::get('/check', ['as' => 'check', 'uses' => 'ListsController@check']);
Route::get('/delete', ['as' => 'deleteItem', 'uses' => 'ListsController@deleteItem']);
Route::get('/items/edit/{id}', ['as' => 'editItem', 'uses' => 'ListsController@editItem']);
Route::post('/items/save/{id}', ['as' => 'editBuy', 'uses' => 'ListsController@editBuy']);
Route::get('/balance', ['as' => 'balance', 'uses' => 'BalanceController@index']);