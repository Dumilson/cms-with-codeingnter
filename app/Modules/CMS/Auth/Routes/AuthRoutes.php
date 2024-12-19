<?php

namespace App\Modules\CMS\Auth\Routes;


use Config\Services;

$routes = Services::routes();

$routes->group('auth', function ($routes) {
  $routes->get('login', 'User\AuthController::index');
  $routes->post('login', 'User\AuthController::login');
  $routes->get('logout', 'User\AuthController::logout');
});
