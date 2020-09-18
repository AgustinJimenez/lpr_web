<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/camaras'], function (Router $router) {
    $router->bind('camara', function ($id) {
        return app('Modules\Camaras\Repositories\CamaraRepository')->find($id);
    });
    $router->get('camaras', [
        'as' => 'admin.camaras.camara.index',
        'uses' => 'CamaraController@index',
        'middleware' => 'can:camaras.camaras.index'
    ]);
    $router->get('camaras/create', [
        'as' => 'admin.camaras.camara.create',
        'uses' => 'CamaraController@create',
        'middleware' => 'can:camaras.camaras.create'
    ]);
    $router->post('camaras', [
        'as' => 'admin.camaras.camara.store',
        'uses' => 'CamaraController@store',
        'middleware' => 'can:camaras.camaras.store'
    ]);
    $router->get('camaras/{camara}/edit', [
        'as' => 'admin.camaras.camara.edit',
        'uses' => 'CamaraController@edit',
        'middleware' => 'can:camaras.camaras.edit'
    ]);
    $router->put('camaras/{camara}', [
        'as' => 'admin.camaras.camara.update',
        'uses' => 'CamaraController@update',
        'middleware' => 'can:camaras.camaras.update'
    ]);
    $router->delete('camaras/{camara}', [
        'as' => 'admin.camaras.camara.destroy',
        'uses' => 'CamaraController@destroy',
        'middleware' => 'can:camaras.camaras.destroy'
    ]);
    $router->bind('configuracion', function ($id) {
        return app('Modules\Camaras\Repositories\ConfiguracionRepository')->find($id);
    });
    $router->get('configuraciones', [
        'as' => 'admin.camaras.configuracion.index',
        'uses' => 'ConfiguracionController@index',
        'middleware' => 'can:camaras.configuraciones.index'
    ]);
    $router->get('configuraciones/create', [
        'as' => 'admin.camaras.configuracion.create',
        'uses' => 'ConfiguracionController@create',
        'middleware' => 'can:camaras.configuraciones.create'
    ]);
    $router->post('configuraciones', [
        'as' => 'admin.camaras.configuracion.store',
        'uses' => 'ConfiguracionController@store',
        'middleware' => 'can:camaras.configuraciones.store'
    ]);
    $router->get('configuraciones/{configuracion}/edit', [
        'as' => 'admin.camaras.configuracion.edit',
        'uses' => 'ConfiguracionController@edit',
        'middleware' => 'can:camaras.configuraciones.edit'
    ]);
    $router->put('configuraciones/{configuracion}', [
        'as' => 'admin.camaras.configuracion.update',
        'uses' => 'ConfiguracionController@update',
        'middleware' => 'can:camaras.configuraciones.update'
    ]);
    $router->delete('configuraciones/{configuracion}', [
        'as' => 'admin.camaras.configuracion.destroy',
        'uses' => 'ConfiguracionController@destroy',
        'middleware' => 'can:camaras.configuraciones.destroy'
    ]);
// append


});
