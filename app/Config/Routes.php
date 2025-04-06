<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/dashboard', 'Dashboard::index');
$routes->get('/profil', 'Profil::index');
$routes->get('/forum', 'Forum::index');
$routes->get('/forum/create', 'Forum::create');
$routes->post('/forum/simpan', 'Forum::simpan');
$routes->get('/anggota', 'Anggota::index');
$routes->get('/tentang', 'Tentang::index');
