<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Su');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->post('/login', 'Su::proses');

$routes->post('/superuser/reservation/add', 'Superuser\Reservation::insert');
$routes->post('/superuser/reservation/checkout/(:num)', 'Superuser\Reservation::checkout/$1');
$routes->post('/superuser/reservation/checkin/(:num)', 'Superuser\Reservation::checkin_insert/$1');

$routes->post('/superuser/setup/type_add', 'Superuser\Setup::type_insert');
$routes->post('/superuser/setup/type_edit/(:num)', 'Superuser\Setup::type_update/$1');

$routes->post('/superuser/setup/rooms_add', 'Superuser\Setup::rooms_insert');
$routes->post('/superuser/setup/rooms_edit/(:num)', 'Superuser\Setup::rooms_update/$1');

$routes->post('/superuser/setup/price_add', 'Superuser\Setup::price_insert');
$routes->post('/superuser/setup/price_edit/(:num)', 'Superuser\Setup::price_update/$1');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
