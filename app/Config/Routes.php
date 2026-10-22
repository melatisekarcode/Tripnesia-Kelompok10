<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');
   $routes->view('simpan', 'simpan');
   $routes->view('login', 'login');
   $routes->view('cari', 'cari');

   $routes->get('detailwisata/(:segment)', 'DetailWisata::detail/$1');
   $routes->get('profile', 'Profile::index');
   $routes->get('profile/edit', 'Profile::edit');