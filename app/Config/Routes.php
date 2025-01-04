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
$routes->get('mantenimiento/ccliente', 'Ccliente::index');
$routes->get('mantenimiento/cequipos', 'Cequipos::index');
$routes->get('mantenimiento/cproveedores', 'Cproveedores::index');
$routes->get('mantenimiento/cremitos', 'Cremitos::index');
$routes->get('mantenimiento/croles', 'Croles::index');
$routes->get('mantenimiento/ctecnico', 'Ctecnico::index');
$routes->get('mantenimiento/ctrabajos', 'Ctrabajos::index');
$routes->get('mantenimiento/cusuario', 'Cusuario::index');
$routes->get('mantenimiento/cparteorden/listar/(:num)', 'Cparteorden::listar/$1');