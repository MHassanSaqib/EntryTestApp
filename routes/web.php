<?php

Route::view('/', 'welcome');

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('question', 'QuestionController');

