<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

//  Auth
$routes->get('/', 'Home::index', ['filter' => 'auth']);
$routes->get('/login', 'Auth::login');
$routes->post('/login', 'Auth::attempLogin');
$routes->get('/register', 'Auth::register');
$routes->post('/register', 'Auth::saveRegister');
$routes->get('/logout', 'Auth::logout');

// barang
$routes->get('/barang', 'Barang::index');
$routes->get('/barang/create', 'Barang::create');
$routes->post('/barang/save', 'Barang::save');
$routes->delete('/barang/(:num)', 'Barang::delete/$1');
$routes->get('/barang/edit/(:num)', 'Barang::edit/$1');
$routes->post('/barang/update/(:num)', 'Barang::update/$1');


// klasifikasi
$routes->get('/klasifikasi', 'Klasifikasi::index');
$routes->get('/klasifikasi/create', 'Klasifikasi::create');
$routes->post('/klasifikasi/save', 'Klasifikasi::save');
$routes->delete('/klasifikasi/(:num)', 'Klasifikasi::delete/$1');
$routes->get('/klasifikasi/edit/(:num)', 'Klasifikasi::edit/$1');
$routes->post('/klasifikasi/update/(:num)', 'Klasifikasi::update/$1');
