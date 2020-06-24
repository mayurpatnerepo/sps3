<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/add_category','Api\CategoryController@index');
Route::post('/add_category/store','Api\CategoryController@store');
Route::get('/add_category/edit/{id}','Api\CategoryController@edit');
Route::post('/add_category/update/{id}','Api\CategoryController@update');
Route::get('/add_category/categoryactive/{id}','Api\CategoryController@categoryActive');


Route::get('/add_property', 'Api\Prop_PropertyController@index')->name('addproperty');
Route::post('/add_property/store','Api\Prop_PropertyController@store');
Route::get('/list_of_property','Api\Prop_propertyController@display')->name('listorg1');