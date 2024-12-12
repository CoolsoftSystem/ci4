<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->setAutoRoute(true);


$routes->get('/', 'Clogin::index');
$routes->post('clogin/clogeo', 'Clogin::clogeo');
$routes->get('clogout', 'Clogin::clogout');

$routes->get('/info', 'Home');
$routes->get('mantenimiento/corden', 'Corden::index');
$routes->get('mantenimiento/cparteorden/listar/(:num)', 'Cparteorden::listar/$1');