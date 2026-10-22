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

$routes->get('lupa-sandi', 'Auth::lupaSandi');          
$routes->post('lupa-sandi', 'Auth::kirimReset');         
$routes->get('reset-sandi/(:any)', 'Auth::resetSandi/$1'); 
$routes->post('reset-sandi', 'Auth::prosesReset');

// Halaman
$routes->view('simpan', 'simpan');
$routes->view('cari', 'cari');
$routes->get('profile', 'Profile::index');
$routes->get('profile/edit', 'Profile::edit');
$routes->get('detailwisata/(:segment)', 'DetailWisata::detail/$1');

