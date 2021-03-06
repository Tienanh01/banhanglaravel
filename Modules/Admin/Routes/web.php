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
Route::group(['prefix'=>'admin'],function(){
	Route::group(['prefix'=>'login','middleware'=>'CheckLogedIn'],function(){
		Route::get('/','AdminLoginController@index');
		Route::post('/','AdminLoginController@postLogin');
	});
});
Route::group(['prefix'=>'admin','middleware'=>'CheckLogedOut'],function(){

	Route::get('/', 'AdminController@index')->name('homeAdmin');
	Route::get('/logout', 'AdminController@getLogout')->name('logout');

	Route::group(['prefix' => 'category'],function(){
		Route::get('/','AdminCategoryController@index') -> name('admin.get.list.category');
		Route::get('/create','AdminCategoryController@create') -> name('admin.get.create.category');
		Route::post('/create','AdminCategoryController@store');
		Route::get('/update/{id}','AdminCategoryController@edit')->name('admin.get.edit.category');
		Route::post('/update/{id}','AdminCategoryController@update');
		Route::get('/detroy/{id}','AdminCategoryController@detroyX')->name('admin.get.detroy.category');
	});

	Route::group(['prefix' => 'product'],function(){
		Route::get('/','AdminProductController@index') -> name('admin.get.list.product');
		Route::get('/create','AdminProductController@create') -> name('admin.get.create.product');
		Route::post('/create','AdminProductController@store');
		Route::get('/update/{id}','AdminProductController@edit')->name('admin.get.edit.product');
		Route::post('/update/{id}','AdminProductController@update');
		Route::get('/detroy/{id}','AdminProductController@detroyX')->name('admin.get.detroy.product');
	});
	Route::group(['prefix' => 'advertisement'],function(){
		Route::get('/','AdminAdvertisementController@index') -> name('admin.get.list.adv');
		Route::get('/create','AdminAdvertisementController@create') -> name('admin.get.create.adv');
		Route::post('/create','AdminAdvertisementController@store');
		Route::get('/update/{id}','AdminAdvertisementController@edit')->name('admin.get.edit.adv');
		Route::post('/update/{id}','AdminAdvertisementController@update');
		Route::get('/detroy/{id}','AdminAdvertisementController@detroyX')->name('admin.get.detroy.adv');
	});
	Route::group(['prefix' => 'banner'],function(){
		Route::get('/','AdminBannnerController@index') -> name('admin.get.list.banner');
		Route::get('/create','AdminBannnerController@create') -> name('admin.get.create.banner');
		Route::post('/create','AdminBannnerController@store');
		Route::get('/update/{id}','AdminBannnerController@edit')->name('admin.get.edit.banner');
		Route::post('/update/{id}','AdminBannnerController@update');
		Route::get('/detroy/{id}','AdminBannnerController@detroyX')->name('admin.get.detroy.banner');
	});
	Route::group(['prefix' => 'buycart'],function(){
		Route::get('/','AdminBuycartController@index') -> name('admin.get.list.buycart');
		Route::get('/update','AdminBuycartController@updateStatus')-> name('updateStatus');
	});
});