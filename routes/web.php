<?php

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

/* OAUTH */
Route::get('/auth/redirect/{social}', 'SocialController@auth')->name('oauth');
Route::get('/callback/{social}', 'SocialController@callback');

//Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
//Route::post('/login', 'Auth\LoginController@login');

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
    /* admin control */
    Route::get('/letAdmin/{user}', 'IndexController@letAdmin')->name('letAdmin');
    Route::get('/removeAdmin/{user}', 'IndexController@removeAdmin')->name('removeAdmin');
    /* user control*/
    Route::get('/deleteUser/{user}', 'IndexController@deleteUser')->name('deleteUser');
    Route::get('/editUser/{user}', 'IndexController@editUser')->name('editUser');
    Route::post('/saveUser/{user}', 'IndexController@saveUser')->name('saveUser');
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

Route::match(['get', 'post'], '/profile', 'ProfileController@index')->name('profile')->middleware('auth');





