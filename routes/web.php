<?php

// ------------------Start Login-----------------------------------------
Route::get('/', 'Auth\LoginController@showLoginForm');
Route::post('login', 'Auth\LoginController@login')->name('login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// ------------------Start Admin-----------------------------------------
Route::get('/home', 'HomeController@index');
