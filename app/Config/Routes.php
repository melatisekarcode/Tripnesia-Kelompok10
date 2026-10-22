<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');

// Auth
$routes->get('login',   'Auth::login');
$routes->post('login',  'Auth::prosesLogin');
$routes->get('daftar',  'Auth::daftar');
$routes->post('daftar', 'Auth::prosesDaftar');
$routes->get('logout',  'Auth::logout');

// Halaman
$routes->view('simpan', 'simpan');
$routes->view('cari', 'cari');
$routes->get('profile', 'Profile::index');
$routes->get('profile/edit', 'Profile::edit');
$routes->get('detailwisata/(:segment)', 'DetailWisata::detail/$1');