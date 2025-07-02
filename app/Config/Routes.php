<?php
use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->group('', ['filter' => 'guest'], function ($routes) {
    $routes->get('/', 'Auth::login');
    $routes->get('login', 'Auth::login');
    $routes->post('login', 'Auth::loginAction');
});

$routes->group('admin', ['filter' => 'auth'], function ($routes) {
    
    $routes->get('/', 'Dashboard::index');
    $routes->get('dashboard', 'Dashboard::index');
    $routes->get('logout', 'Auth::logout');

    $routes->get('gas', 'GasController::index');
    $routes->get('gas/new', 'GasController::new');
    $routes->post('gas', 'GasController::create');
    $routes->get('gas/edit/(:num)', 'GasController::edit/$1');
    $routes->post('gas/(:num)', 'GasController::update/$1'); 
    $routes->delete('gas/(:num)', 'GasController::delete/$1');

    $routes->get('pelanggan', 'Pelanggan::index');
    $routes->get('pelanggan/new', 'Pelanggan::new');
    $routes->post('pelanggan', 'Pelanggan::create');
    $routes->get('pelanggan/edit/(:num)', 'Pelanggan::edit/$1');
    $routes->post('pelanggan/(:num)', 'Pelanggan::update/$1'); 
    $routes->delete('pelanggan/(:num)', 'Pelanggan::delete/$1');

    $routes->get('admins', 'AdminController::index');
    $routes->get('admins/new', 'AdminController::new');
    $routes->post('admins', 'AdminController::create');
    $routes->get('admins/edit/(:num)', 'AdminController::edit/$1');
    $routes->post('admins/(:num)', 'AdminController::update/$1');
    $routes->delete('admins/(:num)', 'AdminController::delete/$1');

    $routes->get('stok', 'StokController::index');
    $routes->get('stok/new', 'StokController::new');
    $routes->post('stok', 'StokController::create');

    $routes->get('transaksi', 'TransaksiController::index');
    $routes->get('transaksi/new', 'TransaksiController::new');
    $routes->post('transaksi/create', 'TransaksiController::create');

    // Tempatkan rute yang lebih spesifik di atas
    $routes->get('transaksi/edit/(:num)', 'TransaksiController::edit/$1');
    $routes->post('transaksi/update/(:num)', 'TransaksiController::update/$1'); // Method POST untuk update

    // Tempatkan rute yang lebih umum di bawah
    $routes->get('transaksi/(:num)', 'TransaksiController::show/$1');
});

$routes->get('/', 'Dashboard::index', ['filter' => 'auth']);