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
//GET de todos los listar
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

//GET de todos los add
$routes->get('mantenimiento/corden/cadd', 'Corden::cadd');
$routes->get('mantenimiento/ccliente/cadd', 'Ccliente::cadd');
$routes->get('mantenimiento/cequipos/cadd', 'Cequipos::cadd');
$routes->get('mantenimiento/cproveedores/cadd', 'Cproveedores::cadd');
$routes->get('mantenimiento/cremitos/cadd', 'Cremitos::cadd');
$routes->get('mantenimiento/croles/cadd', 'Croles::cadd');
$routes->get('mantenimiento/ctecnico/cadd', 'Ctecnico::cadd');
$routes->get('mantenimiento/cusuario/cadd', 'Cusuario::cadd');