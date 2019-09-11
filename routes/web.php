<?php
Route::get('/login', 'Api\ApiLogin@index')->name('login');
Route::post('/login', 'Api\ApiLogin@start')->name('login');
Route::get('/logout', 'Api\ApiLogin@logout')->name('logout');

// Rutas con autentificacion
Route::group(['middleware'=>'auth.api'],function(){
    Route::get('/', 'Home@index')->name('home');
    Route::get('/home', 'Home@index')->name('home');

    Route::resource('/inscripciones', 'Inscripciones');
});

