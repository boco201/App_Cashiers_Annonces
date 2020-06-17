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

//Route::get('/', 'SiteController@showHome');

//Route front-end
Route::get('/', 'Site\AnnoncesController@index')->name('site.annonces.index');
Route::get('/annonces', 'Site\AnnoncesController@index')->name('site.annonces.index');
Route::get('/site/annonces/show/{annonce}-{slug}', 'Site\AnnoncesController@show')->name('site.annonces.show');
Route::get('/site/professionnels/pros/{professionnel}-{slug}', 'Site\ProfessionnelsController@Pros')->name('site.professionnels.pros');

//Routes pour la connexion utilisateur
Route::get('/signup/create', 'Site\UtilisateurController@signUp')->name('site.utilisateurs.signup');
Route::post('/signup', 'Site\UtilisateurController@postSignup')->name('site.utilisateurs.postSignup');
       
        
//Route subscribe
Route::get('/subscribe', 'Site\SubscribeController@getSubscribe')->name('site.subscribes.subscribe');
Route::post('/subscribe', 'Site\SubscribeController@postSubscribe')->name('site.subscribes.post');

Route::group(['middleware' => 'auth'], function() {

    // account rout
    // show the account
    Route::get('/account', 'Site\AccountController@showAccount')->name('site.comptes.account')->middleware('subscribed');

    // update subscription
    Route::post('/account/subscription', 'Site\AccountController@updateSubscription')->name('site.comptes.updateSubscription');

    // update credit card
   Route::post('/account/card', 'Site\AccountController@updateCard')->name('site.comptes.updateCard');

    // download pdf 
    Route::get('account/invoices/{invoice}', 'Site\AccountController@downloadInvoice')->name('site.comptes.invoice');

    // delete subscription
    Route::delete('/account/subscription', 'Site\AccountController@deleteSubscription')->name('site.comptes.deleteSubscription');

//Pro//userprofil faite
    Route::get('/site/professionnels', 'Site\ProfessionnelsController@index')->name('site.professionnels.index')->middleware('subscribed');
    Route::get('/site/professionnels/create', 'Site\ProfessionnelsController@create')->name('site.professionnels.create')->middleware('subscribed');
    Route::post('/site/professionnels', 'Site\ProfessionnelsController@store')->name('site.professionnels.store')->middleware('subscribed');
    Route::get('/site/professionnels/{professionnel}/edit', 'Site\ProfessionnelsController@edit')->name('site.professionnels.edit')->middleware('subscribed');
    Route::get('/site/professionnels/show/{professionnel}', 'Site\ProfessionnelsController@show')->name('site.professionnels.show')->middleware('subscribed');
    Route::patch('/site/professionnels/update/{professionnel}', 'Site\ProfessionnelsController@update')->name('site.professionnels.update')->middleware('subscribed');
    Route::delete('/site/professionnels/destroy/{professionnel}', 'Site\ProfessionnelsController@destroy')->name('site.professionnels.destroy')->middleware('subscribed');
//fin de route

});


Auth::routes(['register' => false]);
require 'admin.php';

Route::get('/home', 'HomeController@index')->name('home');


