<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Clogin::index');
$routes->post('clogin/clogeo', 'Clogin::clogeo');
$routes->get('clogout', 'Clogin::clogout');

$routes->get('/info', 'Home');
