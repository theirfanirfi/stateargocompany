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
Route::post('updateProduct','AdminController@updateProduct')->name('updateProduct');

Route::get('products','AdminController@products')->name('products');
Route::get('groupProducts/{id}','AdminController@GroupProducts')->name('groupProducts');
Route::get('editGroup/{id}','AdminController@editGroup')->name('editGroup');
Route::post('/groupEdit','AdminController@groupEdit')->name('groupEdit');
Route::get('/deleteGroup/{id}','AdminController@deleteGroup')->name('deleteGroup');
Route::get('/deleteProduct/{id}','AdminController@deleteProduct')->name('deleteProduct');
Route::get('product/{id}','AdminController@product')->name('product');

//price

Route::get('/deleteProductPrice/{id}','AdminController@deleteProductPrice')->name('deleteProductPrice');

//users

Route::get('/addUser','AdminController@addUser')->name('addUser');
Route::post('/userAdd','AdminController@userAdd')->name('userAdd');
Route::post('/updateUser','AdminController@updateUser')->name('updateUser');
Route::get('/users','AdminController@users')->name('users');
Route::get('/deleteUser/{id}','AdminController@deleteUser')->name('deleteUser');
Route::get('/editUser/{id}','AdminController@editUser')->name('editUser');

});

