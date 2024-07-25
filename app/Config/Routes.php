<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'BerandaController::index');
$routes->get('/Beranda', 'BerandaController::index');
$routes->get('/login', 'LoginController::index');

#login
$routes->post('/login/auth', 'LoginController::auth');
$routes->get('/admin', 'AdminController::index', ['filter' => 'auth']);
$routes->get('/login/logout', 'LoginController::logout');

#admin
$routes->get('admin', 'Admin\DashboardController::index');


// app/Config/Routes.php
$routes->get('/admin/portfolio', 'AdminPortfolioController::index', ['filter' => 'auth']);
$routes->get('/admin/portfolio/create', 'AdminPortfolioController::create', ['filter' => 'auth']);
$routes->post('/admin/portfolio/store', 'AdminPortfolioController::store', ['filter' => 'auth']);
$routes->get('/admin/portfolio/edit/(:num)', 'AdminPortfolioController::edit/$1', ['filter' => 'auth']);
$routes->post('/admin/portfolio/update/(:num)', 'AdminPortfolioController::update/$1', ['filter' => 'auth']);
$routes->get('/admin/portfolio/delete/(:num)', 'AdminPortfolioController::delete/$1', ['filter' => 'auth']);

//contact
$routes->get('contact', 'Email::index');
$routes->post('contact/send', 'Email::send');

//dashboard
$routes->get('admin', 'Admin\DashboardController::index');
$routes->get('daftar-menu', 'Admin\MenuController::index');







