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
Route::get('/backend/rewards', 'RewardController@getIndex')->name('rewards');
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
Route::get('/read-offer-doc/{offer_id}', 'HomeController@readOfferDoc')->middleware('verified');

Route::get('/backend/users', 'UserController@getIndex');
Route::get('/backend/create/user','UserController@create');
Route::post('/backend/create/user','UserController@store');
Route::get('/backend/edit/user/{id}','UserController@edit');
Route::post('/backend/edit/user/{id}','UserController@update');
Route::get('/backend/delete/user/{id}','UserController@destroy');

Route::get('/backend/contact-information', 'ContactInformationController@getIndex');
Route::post('/backend/contact-information','ContactInformationController@update');

Route::get('/backend/wellcome-email-information', 'WellcomeEmailInfoController@getIndex');
Route::post('/backend/wellcome-email-information','WellcomeEmailInfoController@update');

Route::get('/dashboard','FrontendDashboardController@getIndex');
Route::get('/refferal/{ref_id}','FrontendDashboardController@refferal');
Route::get('/register/{ref_id}','FrontendDashboardController@register');
Route::get('/register/refferal/{ref_id}','RegisterController@store');


Route::get('/backend/rewards_user', 'RewardUserController@getIndex');
Route::get('/backend/rewards_user/data', 'RewardUserController@anyData');
Route::get('/backend/create/rewards_user','RewardUserController@create');
Route::post('/backend/create/rewards_user','RewardUserController@store');
Route::get('/backend/edit/rewards_user/{id}','RewardUserController@edit');
Route::post('/backend/edit/rewards_user/{id}','RewardUserController@update');
Route::get('/backend/delete/rewards_user/{id}','RewardUserController@destroy');

Route::get('/assing-offer-to-user/{offer_id}','FrontendDashboardController@assingOfferToUser')->name('assing-offer-to-user');