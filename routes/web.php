<?php

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login');

Route::group([
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'as' => 'admin.',
    'middleware' => ['auth', 'is_admin']
], function () {
    Route::get('/index', 'IndexController@index')->name('admin');
    Route::match(['get', 'post'],'/news', 'IndexController@news')->name('news');
    Route::get('/test2', 'IndexController@test2')->name('test2');
    Route::get('/deleteNews{news}', 'IndexController@deleteNews')->name('deleteNews');
    Route::get('/editNews{news}', 'IndexController@editNews')->name('editNews');
    Route::post('/saveNews{news}', 'IndexController@saveNews')->name('saveNews');
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





