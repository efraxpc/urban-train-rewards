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

Route::get('/', 'HomeController@index');
Route::get('/about', function()
{
   return View('pages.contact');
});

Auth::routes(['verify' => true]);



Route::get('/logout', 'App\Http\Controllers\Auth\LoginController@logout');

//Frontend
Route::get('/offers/{prize_category_id}', 'OfferController@getIndexFrontend');

//Backend
Route::get('/backend/rewards', 'RewardController@getIndex');
Route::get('/backend/rewards/data', 'RewardController@anyData');
Route::get('/backend/create/reward','RewardController@create');
Route::post('/backend/create/reward','RewardController@store');
Route::get('/backend/edit/reward/{id}','RewardController@edit');
Route::post('/backend/edit/reward/{id}','RewardController@update');
Route::get('/backend/delete/reward/{id}','RewardController@destroy');

Route::get('/backend/offers/{prize_category_id}', 'OfferController@getIndex');
Route::get('/backend/offers', 'OfferController@getIndex');
Route::get('/backend/create/offer','OfferController@create');
Route::post('/backend/create/offer','OfferController@store');
Route::get('/backend/edit/offer/{id}','OfferController@edit');
Route::post('/backend/edit/offer/{id}','OfferController@update');
Route::get('/backend/delete/offer/{id}','OfferController@destroy');

Route::get('/backend/mailchip-info','MailchipinfoController@getIndex');
Route::post('/backend/mailchip-info','MailchipinfoController@update');


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/read-offer-doc/{id}', 'HomeController@readOfferDoc')->middleware('verified');

Route::get('/backend/users', 'UserController@getIndex');


