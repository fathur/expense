<?php

Route::get('/story', 'StoryController@index');
Route::post('/story', 'StoryController@store')->name('story.store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
