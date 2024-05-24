<?php

use App\Admin\Controllers\ParqueaderoController;
use App\Admin\Controllers\Paymodecontroller;
use App\Admin\Controllers\ReservaController;
use App\Admin\Controllers\FacturaController;
use App\Admin\Controllers\LocalizacionController;
use App\Admin\Controllers\MonedaController;
use App\Admin\Controllers\TerminoCondicioneController;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use OpenAdmin\Admin\Facades\Admin;


Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');
    $router->resource('parqueaderos', ParqueaderoController::class);
    $router->resource('reservas', ReservaController::class);
    $router->resource('paymodes', Paymodecontroller::class);
    $router->resource('facturas', FacturaController::class);
    $router->resource('localizacions', LocalizacionController::class);
    $router->resource('monedas', MonedaController::class);
    $router->resource('termino-condiciones', TerminoCondicioneController::class);

});
