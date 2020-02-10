<?php

Route::get('/', 'HomeController@index')->name('home');

Route::get('/news', 'NewsController@index')->name('news');
Route::get('news/{id}', 'NewsController@inCategory');
Route::get('onenews/{id}', 'NewsController@oneNews');