<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Auth::login', ['filter' => 'guest']);
$routes->get('/login', 'Auth::login', ['filter' => 'guest']);
$routes->post('/login', 'Auth::doLogin', ['filter' => 'guest']);
$routes->get('/register', 'Auth::register', ['filter' => 'guest']);
$routes->post('/register', 'Auth::doRegister', ['filter' => 'guest']);

$routes->get('/logout', 'Auth::logout', ['filter' => 'auth']);

$routes->get('/dashboard', 'Dashboard::index', ['filter' => 'auth']);
$routes->get('/userpanel', 'Userpanel::index', ['filter' => 'auth']);

$routes->get('/admin/register', 'Admin::register', ['filter' => 'auth']);
$routes->post('/admin/add', 'Admin::add', ['filter' => 'auth']);
$routes->get('/userpanel', 'UserPanel::index', ['filter' => 'auth']);

$routes->get('/profile/edit', 'Profile::edit');
$routes->post('/profile/update', 'Profile::update');

$routes->group('', ['filter' => 'auth'], function ($routes) {
    $routes->get('/userpanel', 'UserPanel::index');
    $routes->get('/userpanel/edit', 'UserPanel::editProfile');
    $routes->post('/userpanel/update', 'UserPanel::updateProfile');
});

// Untuk User
$routes->get('/userpanel/edit', 'UserPanel::editProfile');
$routes->post('/userpanel/update', 'UserPanel::updateProfile');

// Untuk Admin
$routes->get('/pelanggan/edit/(:num)', 'Pelanggan::edit/$1');
$routes->post('/pelanggan/update/(:num)', 'Pelanggan::update/$1');


$routes->group('', ['filter' => 'auth'], function ($routes) {
    // Pelanggan Routes
    $routes->get('pelanggan', 'Pelanggan::index');
    $routes->get('pelanggan/create', 'Pelanggan::create');
    $routes->post('pelanggan/store', 'Pelanggan::store');
    $routes->get('pelanggan/edit/(:num)', 'Pelanggan::edit/$1');
    $routes->post('pelanggan/update/(:num)', 'Pelanggan::update/$1');
    $routes->get('pelanggan/delete/(:num)', 'Pelanggan::delete/$1');

    // Gas Routes
    $routes->get('/gas', 'Gas::index');
    $routes->get('/gas/create', 'Gas::create');
    $routes->post('/gas/store', 'Gas::store');
    $routes->get('/gas/edit/(:num)', 'Gas::edit/$1');
    $routes->post('/gas/update/(:num)', 'Gas::update/$1');
    $routes->get('/gas/delete/(:num)', 'Gas::delete/$1');

    // Transaksi Routes

    $routes->get('/logout', 'Auth::logout'); 
});















