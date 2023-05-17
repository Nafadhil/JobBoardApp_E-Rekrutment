<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.


// $routes->get('/', 'Home::index');
// $routes->get('/uplod', 'UserData::create');
// $routes->post('/berkas/save', 'UserData::save');
// $routes->get('/berkas', 'UserData::index');
// $routes->get('/berkas/create', 'UserData::create');
// $routes->get('/berkas/download/(:num)', 'UserData::download/$1');
// $routes->get('/job', 'Job::index');
$routes->resource('register');
$routes->resource('login');
$routes->resource('logout');
$routes->group('', ['filter' => 'authMiddleware'], function ($routes) {
    $routes->get('/', 'Home::index');
    $routes->get('/uplod', 'UserData::create');
    $routes->post('/berkas/save', 'UserData::save');
    $routes->get('/berkas', 'UserData::index');
    $routes->get('/apply/(:segment)', 'Job::apply/$1');
    $routes->get('/berkas/download/(:num)', 'UserData::download/$1');
    $routes->get('/job', 'Job::index');
    $routes->get('/job/upload', 'Job::create');
    $routes->post('/job/save', 'Job::save');
    $routes->post('/job/update/(:segment)', 'Job::update/$1');
    $routes->resource('job');
    $routes->resource('userdata');
});
// $routes->get('/job/upload', 'Job::create');
// $routes->post('/job/save', 'Job::save');
// $routes->post('/job/update/(:segment)', 'Job::update/$1');

//$routes->delete('/berkas/(:segment)', 'UserData::delete/$1');





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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}