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

//login 
Route::get('/login','LoginController@login')->name('login');
Route::post('/loginPost','LoginController@loginPost')->name('loginPost');
Route::get('/logout','LoginController@logOut')->name('logout');


Route::group(['prefix' => '/','middleware' => 'Admin'], function () {
Route::get('/','AdminController@index')->name('home');
Route::get('/light','AdminController@light')->name('light');
Route::get('/dark','AdminController@dark')->name('dark');

Route::get('/profile','AdminController@profile')->name('profile');
Route::post('/updateProfile','AdminController@updateProfile')->name('updateProfile');
Route::post('/changePassword','AdminController@changePassword')->name('changePassword');

//groups
Route::get('/groups','AdminController@groups')->name('groups');
Route::post('/addgroup','AdminController@addgroup')->name('addgroup');

//product

Route::get('addproduct','AdminController@addproduct')->name('addproduct');
Route::post('processProduct','AdminController@processProduct')->name('processProduct');

Route::get('products','AdminController@products')->name('products');
Route::get('/deleteProduct/{id}','AdminController@deleteProduct')->name('deleteProduct');

});

