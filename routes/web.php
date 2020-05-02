<?php


Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dash', 'HomeController@dash')->name('dash');
Route::post('/profile/avatar', 'HomeController@avatar');
Route::put('/profile/destroy', 'HomeController@destroy');

// Route::get('/test', 'HomeController@test');

Route::get('/expired', 'HomeController@expired')->name('expired');


Route::group([
    //'as' => '.admin' ver php artisan r:l para ver problema admin.admin.
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'middleware' => ['auth']],
    function (){

        Route::post('users/password/update', 'UsersController@updatePassword');

    }
);


Route::group([
    //'as' => '.admin' ver php artisan r:l para ver problema admin.admin.
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'middleware' => ['auth','password']],
    function (){

        Route::resource('parametros', 'ParametrosController', ['only'=>['index','update'], 'as' => 'root']);
        Route::post('parametros/main', 'ParametrosController@main');
        Route::put('parametros/main/delete', 'ParametrosController@deletemain');
        Route::post('parametros/section', 'ParametrosController@section');
        Route::put('parametros/section/delete', 'ParametrosController@deletesection');

        Route::resource('roles', 'RolesController', ['as' => 'root']);
        Route::resource('permissions', 'PermissionsController', ['except'=>'show', 'as' => 'root']);

        Route::resource('users', 'UsersController', ['as' => 'admin']);

        Route::middleware(['role_or_permission:Root|users'])
            ->put('users/{user}/roles','UsersRolesController@update');

        // Route::middleware('role:Root|Admin')
        //     ->put('users/{user}/permissions','UsersPermissionsController@update');
        Route::middleware(['role_or_permission:Root|users'])
            ->put('users/{user}/permissions','UsersPermissionsController@update');

        Route::middleware(['role_or_permission:Root|users'])
            ->put('users/{user}/empresas','UsersEmpresasController@update');


        Route::put('users/{user}/empresa', 'UsersController@updateEmpresa');
        Route::put('users/{user}/reset', 'UsersController@reset');

        Route::post('users/{user}/avatar', 'AvatarsController@store');
        Route::delete('avatars/{user}/delete', 'AvatarsController@destroy');


        Route::resource('empresas', 'EmpresasController', ['except'=>'show','as' => 'admin']);
        Route::post('empresas/{empresa}/logo', 'EmpresasController@logo');
        Route::put('empresas/{empresa}/logo/delete', 'EmpresasController@deletelogo');
        Route::post('empresas/{empresa}/fondo', 'EmpresasController@fondo');
        Route::put('empresas/{empresa}/fondo/delete', 'EmpresasController@deletefondo');

        Route::resource('ipusers', 'IpUsersController', ['only'=>['store','destroy'], 'as' => 'admin']);

    }
);




Route::any('{all}', function () {
    return view('welcome');
})->where(['all' => '.*']);
