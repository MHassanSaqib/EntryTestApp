<?php

Route::view('/', 'welcome');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

Route::resource('question', 'QuestionController')->middleware('verified');

Route::get('trash/question', 'QuestionTrashController@index')->name('trashed.question.index');

Route::post('trash/question/{question}', 'QuestionTrashController@restore')->name('trashed.question.restore');

Route::delete('trash/question/{question}', 'QuestionTrashController@forcedelete')->name('trashed.question.delete');