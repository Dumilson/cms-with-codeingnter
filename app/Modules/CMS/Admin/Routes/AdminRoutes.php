<?php

namespace App\Modules\CMS\Admin\Routes;

use Config\Services;

$routes = Services::routes();

$routes->get('dashboard', 'Admin\AdminController::index', ['filter' => 'auth']);