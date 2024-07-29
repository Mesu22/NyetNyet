<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'BerandaController::index');
$routes->get('/Beranda', 'BerandaController::index');
$routes->get('/login', 'LoginController::index');

# Login
$routes->post('/login/auth', 'LoginController::auth');
$routes->get('/login/logout', 'LoginController::logout');

# Admin
$routes->group('admin', ['filter' => 'auth'], function ($routes) {
    $routes->get('', 'AdminController::index');
    $routes->get('users', 'AdminController::users');
    
    // Portfolio routes
    $routes->get('menu', 'AdminPortfolioController::index');
    $routes->get('menu/create', 'AdminPortfolioController::create');
    $routes->post('menu/store', 'AdminPortfolioController::store');
    $routes->get('menu/edit/(:num)', 'AdminPortfolioController::edit/$1');
    $routes->post('menu/update/(:num)', 'AdminPortfolioController::update/$1');
    $routes->get('menu/delete/(:num)', 'AdminPortfolioController::delete/$1');

    // Contact routes
    $routes->get('contacts', 'ContactController::index');
    $routes->get('contacts/create', 'ContactController::create');
    $routes->post('contacts/store', 'ContactController::store');
    $routes->get('contacts/edit/(:num)', 'ContactController::edit/$1');
    $routes->post('contacts/update/(:num)', 'ContactController::update/$1');
    $routes->get('contacts/delete/(:num)', 'ContactController::delete/$1');

    // Hero Section routes
    $routes->group('hero-section', function($routes) {
        $routes->get('', 'HeroSectionController::index');
        $routes->get('create', 'HeroSectionController::create');
        $routes->post('store', 'HeroSectionController::store');
        $routes->get('edit/(:num)', 'HeroSectionController::edit/$1');
        $routes->post('update/(:num)', 'HeroSectionController::update/$1');
        $routes->get('delete/(:num)', 'HeroSectionController::delete/$1');
    });

    // About routes
    $routes->group('about', function($routes) {
        $routes->get('', 'AboutController::index');
        $routes->get('create', 'AboutController::create');
        $routes->post('store', 'AboutController::store');
        $routes->get('edit/(:num)', 'AboutController::edit/$1');
        $routes->post('update/(:num)', 'AboutController::update/$1');
        $routes->get('delete/(:num)', 'AboutController::delete/$1');
    });

    // Services routes
    $routes->group('services', function($routes) {
        $routes->get('', 'ServiceController::index');
        $routes->get('create', 'ServiceController::create');
        $routes->post('store', 'ServiceController::store');
        $routes->get('edit/(:num)', 'ServiceController::edit/$1');
        $routes->post('update/(:num)', 'ServiceController::update/$1');
        $routes->get('delete/(:num)', 'ServiceController::delete/$1');
    });
});

# Contact
$routes->get('contact', 'ContactController::index');
$routes->post('contact/send', 'ContactController::send');

# Admin Content
$routes->get('admin/getContent/(:segment)', 'AdminController::getContent/$1');

# Paket Spesial routes
$routes->group('admin', ['namespace' => 'App\Controllers'], function($routes) {
    $routes->get('paket', 'PaketController::index');
    $routes->get('paket/create', 'PaketController::create');
    $routes->post('paket/store', 'PaketController::store');
    $routes->get('paket/edit/(:num)', 'PaketController::edit/$1');
    $routes->post('paket/update/(:num)', 'PaketController::update/$1');
    $routes->get('paket/delete/(:num)', 'PaketController::delete/$1');
});

# Client routes
$routes->group('admin', ['namespace' => 'App\Controllers'], function($routes) {
    $routes->get('clients', 'ClientController::index');
    $routes->get('clients/create', 'ClientController::create');
    $routes->post('clients/store', 'ClientController::store');
    $routes->get('clients/edit/(:num)', 'ClientController::edit/$1');
    $routes->post('clients/update/(:num)', 'ClientController::update/$1');
    $routes->get('clients/delete/(:num)', 'ClientController::delete/$1');
});