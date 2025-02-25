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



//GET de todos los edit
$routes->get('mantenimiento/corden/cedit/(:num)', 'Corden::cedit/$1');
$routes->get('mantenimiento/ccliente/cedit/(:num)', 'Ccliente::cedit/$1');
$routes->get('mantenimiento/cequipos/cedit/(:num)', 'Cequipos::cedit/$1');
$routes->get('mantenimiento/cproveedores/cedit/(:num)', 'Cproveedores::cedit/$1');
$routes->get('mantenimiento/cremitos/cedit/(:num)', 'Cremitos::cedit/$1');
$routes->get('mantenimiento/cremitos/ceditProd/(:num)', 'Cremitos::ceditProd/$1');
$routes->get('mantenimiento/croles/cedit/(:num)', 'Croles::cedit/$1');
$routes->get('mantenimiento/ctecnico/cedit/(:num)', 'Ctecnico::cedit/$1');
$routes->get('mantenimiento/cusuario/cedit/(:num)', 'Cusuario::cedit/$1');

//GET de los print
$routes->get('mantenimiento/cequipos/print/(:num)', 'Cequipos::print/$1'); 
$routes->get('mantenimiento/cremitos/cprint/(:num)', 'Cremitos::cprint/$1');

//Post de todos los adds
$routes->post('mantenimiento/corden/cinsert', 'Corden::cinsert');
$routes->post('mantenimiento/ccliente/cinsert', 'Ccliente::cinsert');
$routes->post('mantenimiento/cequipos/cinsert', 'Cequipos::cinsert');
$routes->post('mantenimiento/cproveedores/cinsert', 'Cproveedores::cinsert');
$routes->post('mantenimiento/cremitos/cinsert', 'Cremitos::cinsert');
$routes->post('mantenimiento/croles/cinsert', 'Croles::cinsert');
$routes->post('mantenimiento/ctecnico/cinsert', 'Ctecnico::cinsert');
$routes->post('mantenimiento/cusuario/cinsert', 'Cusuario::cinsert');

//Post de todos los delete
$routes->post('mantenimiento/corden/cdelete/(:num)', 'Corden::cdelete/$1');
$routes->post('mantenimiento/ccliente/cdelete/(:num)', 'Ccliente::cdelete/$1');
$routes->post('mantenimiento/cequipos/cdelete/(:num)', 'Cequipos::cdelete/$1');
$routes->post('mantenimiento/cproveedores/cdelete/(:num)', 'Cproveedores::cdelete/$1');
$routes->post('mantenimiento/cremitos/cdelete/(:num)', 'Cremitos::cdelete/$1');
$routes->post('mantenimiento/croles/cdelete/(:num)', 'Croles::cdelete/$1');
$routes->post('mantenimiento/ctecnico/cdelete/(:num)', 'Ctecnico::cdelete/$1');
$routes->post('mantenimiento/cusuario/cdelete/(:num)', 'Cusuario::cdelete/$1');

//Post de todos los edit
$routes->post('mantenimiento/corden/cupdate', 'Corden::cupdate');
$routes->post('mantenimiento/ccliente/cupdate', 'Ccliente::cupdate');
$routes->post('mantenimiento/cequipos/cupdate', 'Cequipos::cupdate');
$routes->post('mantenimiento/cproveedores/cupdate', 'Cproveedores::cupdate');
$routes->post('mantenimiento/cremitos/cupdate', 'Cremitos::cupdate');
$routes->post('mantenimiento/cremitos/cupdateProd', 'Cremitos::cupdateProd');
$routes->post('mantenimiento/croles/cupdate', 'Croles::cupdate');
$routes->post('mantenimiento/ctecnico/cupdate', 'Ctecnico::cupdate');
$routes->post('mantenimiento/cusuario/cupdate', 'Cusuario::cupdate');