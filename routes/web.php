<?php
Route::get('/', 'StoryController@index');

Auth::routes();

Route::get('/story', 'StoryController@index');
Route::post('/story', 'StoryController@store')->name('story.store');

