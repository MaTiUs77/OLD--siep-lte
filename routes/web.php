<?php
Route::get('/login', 'Api\ApiLogin@index')->name('login');
Route::post('/login', 'Api\ApiLogin@start')->name('login');
Route::get('/logout', 'Api\ApiLogin@logout')->name('logout');

//--- Rutas con autentificacion ---//
Route::group(['middleware'=>'auth.api'],function(){
    Route::get('/', 'View\Home@index')->name('home');
    Route::get('/home', 'View\Home@index')->name('home');


    //--- Rutas de pagina ADMIN ---//
    Route::prefix('admin')->group(function () {
        Route::get('/', 'View\Admin\Admin@index')->name('admin');
        Route::resource('/roles', 'View\Admin\AdminRoles');
    });

    Route::resource('inscripciones', 'View\Inscripciones');
    Route::resource('promocionados', 'View\Promocionados');
    Route::resource('repitentes', 'View\Repitentes');

    Route::resource('secciones', 'View\Secciones');
});
//--- End Rutas con autentificacion ---//
