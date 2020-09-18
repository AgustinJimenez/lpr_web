<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/accesos'], function (Router $router) {
    $router->bind('empresa', function ($id) {
        return app('Modules\Accesos\Repositories\EmpresaRepository')->find($id);
    });
    $router->get('empresas', [
        'as' => 'admin.accesos.empresa.index',
        'uses' => 'EmpresaController@index',
        'middleware' => 'can:accesos.empresas.index'
    ]);
    $router->get('empresas/create', [
        'as' => 'admin.accesos.empresa.create',
        'uses' => 'EmpresaController@create',
        'middleware' => 'can:accesos.empresas.create'
    ]);
    $router->post('empresas', [
        'as' => 'admin.accesos.empresa.store',
        'uses' => 'EmpresaController@store',
        'middleware' => 'can:accesos.empresas.store'
    ]);
    $router->get('empresas/{empresa}/edit', [
        'as' => 'admin.accesos.empresa.edit',
        'uses' => 'EmpresaController@edit',
        'middleware' => 'can:accesos.empresas.edit'
    ]);
    $router->put('empresas/{empresa}', [
        'as' => 'admin.accesos.empresa.update',
        'uses' => 'EmpresaController@update',
        'middleware' => 'can:accesos.empresas.update'
    ]);
    $router->delete('empresas/{empresa}', [
        'as' => 'admin.accesos.empresa.destroy',
        'uses' => 'EmpresaController@destroy',
        'middleware' => 'can:accesos.empresas.destroy'
    ]);
    $router->bind('sector', function ($id) {
        return app('Modules\Accesos\Repositories\SectorRepository')->find($id);
    });
    $router->get('sectores', [
        'as' => 'admin.accesos.sector.index',
        'uses' => 'SectorController@index',
        'middleware' => 'can:accesos.sectores.index'
    ]);
    $router->get('sectores/create', [
        'as' => 'admin.accesos.sector.create',
        'uses' => 'SectorController@create',
        'middleware' => 'can:accesos.sectores.create'
    ]);
    $router->post('sectores', [
        'as' => 'admin.accesos.sector.store',
        'uses' => 'SectorController@store',
        'middleware' => 'can:accesos.sectores.store'
    ]);
    $router->get('sectores/{sector}/edit', [
        'as' => 'admin.accesos.sector.edit',
        'uses' => 'SectorController@edit',
        'middleware' => 'can:accesos.sectores.edit'
    ]);
    $router->put('sectores/{sector}', [
        'as' => 'admin.accesos.sector.update',
        'uses' => 'SectorController@update',
        'middleware' => 'can:accesos.sectores.update'
    ]);
    $router->delete('sectores/{sector}', [
        'as' => 'admin.accesos.sector.destroy',
        'uses' => 'SectorController@destroy',
        'middleware' => 'can:accesos.sectores.destroy'
    ]);
    $router->bind('acceso', function ($id) {
        return app('Modules\Accesos\Repositories\AccesoRepository')->find($id);
    });
    $router->get('accesos', [
        'as' => 'admin.accesos.acceso.index',
        'uses' => 'AccesoController@index',
        'middleware' => 'can:accesos.accesos.index'
    ]);
    $router->get('accesos/create', [
        'as' => 'admin.accesos.acceso.create',
        'uses' => 'AccesoController@create',
        'middleware' => 'can:accesos.accesos.create'
    ]);
    $router->post('accesos', [
        'as' => 'admin.accesos.acceso.store',
        'uses' => 'AccesoController@store',
        'middleware' => 'can:accesos.accesos.store'
    ]);
    $router->get('accesos/{acceso}/edit', [
        'as' => 'admin.accesos.acceso.edit',
        'uses' => 'AccesoController@edit',
        'middleware' => 'can:accesos.accesos.edit'
    ]);
    $router->put('accesos/{acceso}', [
        'as' => 'admin.accesos.acceso.update',
        'uses' => 'AccesoController@update',
        'middleware' => 'can:accesos.accesos.update'
    ]);
    $router->delete('accesos/{acceso}', [
        'as' => 'admin.accesos.acceso.destroy',
        'uses' => 'AccesoController@destroy',
        'middleware' => 'can:accesos.accesos.destroy'
    ]);
// append



});
