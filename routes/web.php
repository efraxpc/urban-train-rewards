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

Route::get('/', 'HomeController@getIndex');
Route::get('/about', function()
{
   return View('pages.contact');
});


Route::get('/rewards', 'RewardController@getIndex');
Route::get('/rewards/data', 'RewardController@anyData');
Route::get('/create/reward','RewardController@create');
Route::post('/create/reward','RewardController@store');
Route::get('/edit/reward/{id}','RewardController@edit');
Route::post('/edit/reward/{id}','RewardController@update');
Route::get('/delete/reward/{id}','RewardController@destroy');

Route::get('/offers', 'OfferController@getIndex');
Route::get('/create/offer','OfferController@create');
Route::post('/create/offer','OfferController@store');