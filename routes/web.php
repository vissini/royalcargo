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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('companies', 'CompanyController')->middleware('auth');
Route::resource('contacts', 'ContactController')->middleware('auth');
Route::resource('companies.contacts', 'CompanyContactController')->middleware('auth');
Route::resource('contacts.phones', 'ContactPhoneController')->middleware('auth');