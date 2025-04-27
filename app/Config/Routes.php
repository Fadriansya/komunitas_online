<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
// $routes->get('/dashboard', 'Dashboard::index');
$routes->get('/profil', 'Profil::index');
$routes->get('/anggota', 'Anggota::index');
$routes->get('/tentang', 'Tentang::index');

// register
$routes->get('/register', 'RegisterController::index');
$routes->post('/register/store', 'RegisterController::store');
$routes->get('register', 'Auth::register');
$routes->post('register/save', 'Auth::save');
$routes->get('anggota', 'Anggota::index');

// login
$routes->get('/login', 'LoginController::index');
$routes->post('/login', 'LoginController::login');
$routes->get('/logout', 'LoginController::logout');

// komentar
$routes->get('/forum', 'Forum::index');
$routes->get('/forum/create', 'Forum::create');
$routes->post('/forum/simpan', 'Forum::simpan');
$routes->get('/forum/detail/(:num)', 'Forum::detail/$1');
$routes->post('/forum/comment/(:num)', 'Forum::comment/$1');

// Admin Area (dengan filter adminfilter)
$routes->group('admin', ['filters' => 'AdminFilter'], function ($routes) {});
$routes->get('dashboard',         'Admin::dashboard');
$routes->get('manage-users',      'Admin::manageUsers');
$routes->get('delete-user/(:num)', 'Admin::deleteUser/$1');
