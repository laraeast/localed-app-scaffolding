<?php

Route::get('/', 'HomeController')->name('home');

Route::post('media/upload', 'HomeController@upload')->name('media.upload');

Route::get('language/{language}', 'LanguageController@update')->name('language.update');

Route::resource('admins', 'AdminController');

Route::resource('users', 'UserController');

Route::resource('categories', 'CategoryController');
