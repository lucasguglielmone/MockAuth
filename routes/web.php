<?php

Route::get('/', function(){return view('layouts.app');});

//Auth::routes();

//Route::post('/login','Auth\LoginController@login');
Route::post('/auth/oauth/v2/authorize', 'OauthController@loginwToken')->name('submitLogin');
//Route::get('/login','Auth\LoginController@ShowLoginForm')->name('login');
Route::get('/auth/oauth/v2/authorize','OauthController@index')->name('login');
Route::post('/logout','Auth\LoginController@logout')->name('logout');
Route::get('/oauth/authorize','\Laravel\Passport\Http\Controllers\AuthorizationController@authorize')->name('passport.authorizations.authorize');
Route::get('/oauth/authorize','\Laravel\Passport\Http\Controllers\ApproveAuthorizationController@approve')->name('passport.authorizations.approve');
Route::delete('/oauth/authorize','\Laravel\Passport\Http\Controllers\ApproveAuthorizationController@deny')->name('passport.authorizations.deny');
Route::get('/oauth/clients','\Laravel\Passport\Http\Controllers\ClientController@forUser')->name('passport.clients.index');
Route::post('/oauth/clients','\Laravel\Passport\Http\Controllers\ClientController@store')->name('passport.clients.store');
Route::put('/oauth/clients/{client_id}','\Laravel\Passport\Http\Controllers\ClientController@update')->name('passport.clients.update');
Route::delete('/oauth/clients/{client_id}','\Laravel\Passport\Http\Controllers\ClientController@destroy')->name('passport.clients.destroy');
Route::post('/oauth/personal-access-tokens','\Laravel\Passport\Http\Controllers\ClientController@destroy')->name('passport.personal.tokens.store');
Route::post('/oauth/personal-access-tokens','\Laravel\Passport\Http\Controllers\PersonalAccessTokenController@store')->name('passport.personal.tokens.store');
Route::get('/oauth/personal-access-tokens','\Laravel\Passport\Http\Controllers\PersonalAccessTokenController@index')->name('passport.personal.tokens.index');
Route::delete('/oauth/personal-access-tokens/{token_id}','\Laravel\Passport\Http\Controllers\PersonalAccessTokenController@destroy')->name('passport.personal.tokens.destroy');
Route::get('/oauth/scopes','\Laravel\Passport\Http\Controllers\ScopeController@all')->name('passport.scopes.index');
//Route::post('/oauth/token','\Laravel\Passport\Http\Controllers\AccessTokenController@issueToken')->name('passport.token');
Route::get('/auth/oauth/v2/token', 'OauthController@token')->name('passport.token');
Route::post('/oauth/token/refresh','\Laravel\Passport\Http\Controllers\TransientTokenController@refresh')->name('passport.token.refresh');
Route::get('/oauth/tokens','\Laravel\Passport\Http\Controllers\AuthorizedAccessTokenController@forUser')->name('passport.tokens.index');
Route::delete('/oauth/tokens/{token_id}','\Laravel\Passport\Http\Controllers\AuthorizedAccessTokenController@destroy')->name('passport.tokens.destroy');
Route::post('/password/email','Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('/password/reset','Auth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
Route::post('/password/reset','Auth\ResetPasswordController@reset')->name('password.update');
Route::get('/password/reset/{token}','Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::get('/password/reset','App\Http\Controllers\Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::get('/register','Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('/register','Auth\RegisterController@register');
//Route::post('/register','OauthController@register');


Route::get('/api/v1/rewards/clientsData', 'ApiController@clientsData');
Route::get('/api/v1/rewards/{id_reward}/pointsBalance', 'ApiController@pointsBalance');

Route::post('/api/v1/rewards/{id_reward}/redeems', 'ApiController@store');
Route::put('/api/v1/rewards/{id_reward}/redeems/{id_redeem}', 'ApiController@update');
Route::delete('/api/v1/rewards/{id_reward}/redeems/{id_redeem}', 'ApiController@destroy');

// Passport
Route::get('/settings', 'SettingsController@index')->name('settings');

Route::get('/passlogin','Auth\LoginController@ShowLoginForm')->name('passLogin');
Route::post('/passlogin','Auth\LoginController@login');

Route::get('/home', function(){ return view('layouts.app') ;});
Route::get('/home/code={token}', function(){ return view('layouts.app') ;});



/* Old Routes
Route::get('/auth/oauth/v2/authorize', 'OauthController@index');
Route::post('/auth/oauth/v2/authorize', 'OauthController@login')->name('login');
Route::get('/auth/oauth/v2/token', 'OauthController@token');
*/
