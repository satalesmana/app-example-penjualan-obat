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
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->post('/auth/login', 'AuthController::login');
$routes->get('/auth/logout', 'AuthController::logout');

$routes->resource('/register', ['controller' =>'RegisterController', 
    'except' => 'show,update,delete,new,edit']);
    
$routes->get('/register/list', 'RegisterController::list');


$routes->group('admin', ['namespace' => 'App\Controllers', 'filter' => 'authfilter'], function ($routes) {
    $routes->get('dashboard', 'Home::dashboard');
    $routes->resource('users', ['controller' =>'UserController', 'except' => 'new,edit']);
    $routes->resource('obat', ['controller' =>'ObatController', 'except' => 'new,edit']);
    $routes->resource('transaksi/penjualan', ['controller' =>'PenjualanController', 'except' => 'new,edit']);
    $routes->get('transaksi/penjualan_list', 'PenjualanController::list_penjualan');
});
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
