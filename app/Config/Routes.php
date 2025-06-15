<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('game', 'Home::game');

// route untuk profil
$routes->get('/profil', 'UserController::profile', ['filter' => 'auth']);
$routes->get('profilsaya', 'UserController::profile');
$routes->get('profile', 'UserController::profile');
$routes->post('profile/update', 'UserController::update');


$routes->get('/anggota', 'Anggota::index');
$routes->get('/tentang', 'Tentang::index');
$routes->post('/theme/toggle', 'ThemeController::toggle');


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
$routes->post('admin/delete_user/(:num)', 'Admin::deleteUser/$1');
