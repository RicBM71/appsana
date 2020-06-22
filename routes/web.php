<?php


Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dash', 'HomeController@dash')->name('dash');
Route::post('/profile/avatar', 'HomeController@avatar');
Route::put('/profile/destroy', 'HomeController@destroy');



Route::get('/expired', 'HomeController@expired')->name('expired');

Route::group([
    //'as' => '.admin' ver php artisan r:l para ver problema admin.admin.
    'prefix' => 'dash',
    'namespace' => 'Dash',
    'middleware' => ['auth']],
    function (){

        Route::get('/citas', 'CitasController@index')->name('index');
        // Route::post('users/password/update', 'UsersController@updatePassword');

    }
);

Route::any('{all}', function () {
    return view('welcome');
})->where(['all' => '.*']);
