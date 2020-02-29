<?php

Route::get('/', 'HomeController@index')->name('home');
Route::get('/login', 'HomeController@login')->name('login');

Route::group([
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'as' => 'admin.'
], function () {
    Route::get('/index', 'IndexController@index')->name('admin');
    Route::match(['get', 'post'],'/news', 'IndexController@news')->name('news');
    Route::get('/test2', 'IndexController@test2')->name('test2');
    Route::get('/deleteNews/{news}', 'IndexController@deleteNews')->name('deleteNews');
});

Route::group(
    [
        'prefix' => 'news',
        'as' => 'news.'
    ], function () {
    Route::get('/all', 'NewsController@news')->name('all');
    Route::get('/one/{news}', 'NewsController@newsOne')->name('One');
    Route::get('/categories', 'NewsController@categories')->name('categories');
    Route::get('/category/{id}', 'NewsController@categoryId')->name('categoryId');
}
);



//Auth::routes();

