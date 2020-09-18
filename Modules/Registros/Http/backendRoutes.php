<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/registros'], function (Router $router) {
    $router->bind('registro', function ($id) 
    {
        return app('Modules\Registros\Repositories\RegistroRepository')->find($id);
    });
    $router->get('registros', [
        'as' => 'admin.registros.registro.index',
        'uses' => 'RegistroController@index',
        'middleware' => 'can:registros.registros.index'
    ]);
    $router->post('registros/index_ajax', 
    [
        'as' => 'admin.registros.registro.index_ajax',
        'uses' => 'RegistroController@index_ajax',
        'middleware' => 'can:registros.registros.index_ajax'
    ]);
    $router->put('registros/index_ajax_edit/{registro}', 
    [
        'as' => 'admin.registros.registro.index_ajax_edit',
        'uses' => 'RegistroController@index_ajax_edit',
        'middleware' => 'can:registros.registros.index_ajax_edit'
    ]);
    $router->get('registros/create', [
        'as' => 'admin.registros.registro.create',
        'uses' => 'RegistroController@create',
        'middleware' => 'can:registros.registros.create'
    ]);
    $router->post('registros', [
        'as' => 'admin.registros.registro.store',
        'uses' => 'RegistroController@store',
        'middleware' => 'can:registros.registros.store'
    ]);
    $router->get('registros/{registro}/edit', [
        'as' => 'admin.registros.registro.edit',
        'uses' => 'RegistroController@edit',
        'middleware' => 'can:registros.registros.edit'
    ]);
    $router->put('registros/{registro}', [
        'as' => 'admin.registros.registro.update',
        'uses' => 'RegistroController@update',
        'middleware' => 'can:registros.registros.update'
    ]);
    $router->delete('registros/{registro}', [
        'as' => 'admin.registros.registro.destroy',
        'uses' => 'RegistroController@destroy',
        'middleware' => 'can:registros.registros.destroy'
    ]);
// append

});
