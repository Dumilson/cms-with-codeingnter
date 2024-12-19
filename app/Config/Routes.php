<?php

use CodeIgniter\Router\RouteCollection;

require_once APPPATH . 'Modules//CMS//Admin//Routes//AdminRoutes.php';
require_once APPPATH . 'Modules//CMS//Auth//Routes//AuthRoutes.php';
require_once APPPATH . 'Modules//CMS//Client//Routes//ClientRoutes.php';

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
