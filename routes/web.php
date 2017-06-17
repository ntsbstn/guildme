<?php

//DEFAULTS
Route::get('/', function () {
    return view('home');
});

//GUILDS
Route::get('/guilds', 'GuildsController@index')->name('guilds');
Route::get('/guilds/new/', 'GuildsController@create')->name('add-guild');
Route::post('/guilds/new/', 'GuildsController@store');
Route::get('/guilds/{id}', 'GuildsController@show');

//CHARACTERS
Route::get('/characters', 'CharactersController@index')->name('characters');
Route::get('/characters/{id}', 'CharactersController@show')->name('show-character');
Route::get('/characters/{id}/update', 'CharactersController@update')->name('update-character');
//USERS
//Auth::routes();

Route::group(['middleware' => 'visitors'], function(){
    Route::get('/register', 'RegistrationController@register')->name('register');
    Route::post('/register', 'RegistrationController@postregister');
    
    Route::get('activate/{uid}/{activationCode}', 'ActivationController@activate');

    Route::get('/login', 'LoginController@login')->name('loginform');
    Route::post('/login', 'LoginController@postlogin');

    //Battlenet
    Route::get('login/{provider}', array('as' => 'redirect', 'uses' => 'AuthController@redirectToProvider'));
    Route::get('login/callback/{provider}', array('as' => 'callback', 'uses' => 'AuthController@handleProviderCallback'));



    Route::get('/forgot-password', 'passwordController@forgotPassword')->name('forget-password');
    Route::post('/forgot-password', 'passwordController@postForgotPassword');
    
    Route::get('/reset/{uid}/{resetCode}', 'passwordController@resetPassword');
    Route::post('/reset/{uid}/{resetCode}', 'passwordController@postResetPassword');

});

Route::group(['middleware' => 'users'], function(){
    Route::get('/my', 'UserController@index')->name('my');
    Route::get('/my/account/edit', 'UserController@edit')->name('edit-user');
    Route::post('/my/account/edit/account', 'UserController@storeAccount')->name('store-account');
    Route::post('/my/account/edit/preferences', 'UserController@storePreferences')->name('store-preferences');
    Route::post('/my/account/edit/gameplay', 'UserController@storeGameplay')->name('store-gameplay');
    Route::get('my/credentials', 'AuthController@setCredentials')->name('set-credentials');
    Route::post('my/credentials', 'AuthController@storeCredentials');


    Route::get('/my/character/add', 'CharactersController@create')->name('add-character');
    Route::post('/my/character/add', 'CharactersController@store');
    Route::post('/my/characters/refresh', 'AjaxController@updateCharacterList');


    Route::get('/my/recruitments/new', 'RecruitmentsController@create')->name('new-recruitment');
    Route::post('/my/recruitments/new', 'RecruitmentsController@store');

});

Route::post('/logout', 'loginController@logout')->name('logout');

//ROLES
Route::group(['middleware' => 'admin'], function(){
    Route::get('/azeroth', 'AdminController@index')->name('admin');
    Route::get('/azeroth/servers', 'AdminController@getServers')->name('update-servers');
});

//BROL
Route::get('/home', 'HomeController@index')->name('home');
