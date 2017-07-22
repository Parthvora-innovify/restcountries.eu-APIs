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

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'CountryController@listAllCountries');
Route::get('countries/{name}', 'CountryController@countryDetail')->name('country.show');
Route::get('currency/{currency}', 'CountryController@currencyCountries')->name('country.currency');
