<?php

Route::view('/', 'welcome');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

Route::resource('question', 'QuestionController')->middleware('verified');

