<?php
//userprofil faite
Route::get('/site/profils', 'Site\UserProfilController@index')->name('site.profils.index');
Route::get('/site/profils/create', 'Site\UserProfilController@create')->name('site.profils.create');
Route::post('/site/profils', 'Site\UserProfilController@store')->name('site.profils.store');
Route::get('/site/profils/{annonce}/edit', 'Site\UserProfilController@edit')->name('site.profils.edit');
Route::get('/site/profils/show/{annonce}', 'Site\UserProfilController@show')->name('site.profils.show');
Route::patch('/site/profils/update/{annonce}', 'Site\UserProfilController@update')->name('site.profils.update');
Route::delete('/site/profils/destroy/{annonce}', 'Site\UserProfilController@destroy')->name('site.profils.destroy');
//fin

//fin des routes upload multiple
Route::group(['prefix'  =>  'admin'], function () {
//Routes pour l'administration
//Route::get('/admin', 'Admin\AdminAnnoncesController@index')->name('admins.annonces.index');
  
    Route::get('login', 'Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'Admin\LoginController@login')->name('admin.login.post');
    Route::get('logout', 'Admin\LoginController@logout')->name('admin.logout');

    Route::group(['middleware' => ['auth:admin']], function () {
        Route::get('/', 'Admin\AdminAnnoncesController@index')->name('admin.annonces.index');
        Route::get('/create', 'Admin\AdminAnnoncesController@create')->name('admin.annonces.create');
        Route::post('/store', 'Admin\AdminAnnoncesController@store')->name('admin.annonces.store');
        Route::get('/{annonce}/edit', 'Admin\AdminAnnoncesController@edit')->name('admin.annonces.edit');
        Route::get('/show/{annonce}', 'Admin\AdminAnnoncesController@show')->name('admin.annonces.show');
        Route::patch('/update/{annonce}', 'Admin\AdminAnnoncesController@update')->name('admin.annonces.update');
        Route::delete('/destroy/{annonce}', 'Admin\AdminAnnoncesController@destroy')->name('admin.annonces.destroy');
        
        //routes premiums
        Route::get('/premiums', 'Admin\AdminPremiumsController@index')->name('admin.premiums.index');
        Route::patch('/premiums/{annonce}', 'Admin\AdminPremiumsController@update')->name('admin.premiums.update');
        Route::delete('/premiums/{annonce}', 'Admin\AdminPremiumsController@destroy')->name('admin.premiums.destroy');

          //routes professionnels premium
          Route::get('/professionnels/premium', 'Admin\ProfessionnelPremiumController@index')->name('admin.professionnels.premium.index');
          Route::patch('/professionnels/premium/{professionnel}', 'Admin\ProfessionnelPremiumController@update')->name('admin.professionnels.premium.update');
          Route::delete('/professionnels/premium/{professionnel}', 'Admin\ProfessionnelPremiumController@destroy')->name('admin.professionnels.premium.destroy');

       Route::get('/', function () {
        return view('admin.dashboard.index');
    })->name('admin.dashboard');

   });

});