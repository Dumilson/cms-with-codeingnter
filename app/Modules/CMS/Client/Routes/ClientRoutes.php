<?php

namespace App\Modules\CMS\Client\Routes;

use Config\Services;

$routes = Services::routes();

$routes->group('client', ['filter' => 'auth'], function ($routes) {
  $routes->get('', 'Client\ClientController::index');
  $routes->get('create', 'Client\ClientController::create');
  $routes->post('store', 'Client\ClientController::store');
  $routes->get('edit/(:num)', 'Client\ClientController::edit/$1');
  $routes->post('update/(:num)', 'Client\ClientController::update/$1');
  $routes->get('delete/(:num)', 'Client\ClientController::delete/$1');
});