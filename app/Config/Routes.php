<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/about', 'About::index');
$routes->get('/services', 'Services::index');
$routes->match(['get', 'post'], '/contact', 'Contact::index');
$routes->get('/register', 'Register::index');
$routes->post('/register', 'Register::create');
$routes->get('/login', 'Login::index');
$routes->post('/login/authenticate', 'Login::authenticate');
$routes->get('/login-success', 'Login::loginSuccess');

$routes->post('/logout', 'Login::logout');

$routes->get('/customer-accounts', 'CustomerAccounts::index');
$routes->get('/account/(:num)', 'CustomerAccounts::viewAccount/$1');

$routes->get('/account/create', 'CustomerAccounts::create');
$routes->post('/account/store', 'CustomerAccounts::store');

$routes->get('/account/edit/(:num)', 'CustomerAccounts::edit/$1');
$routes->post('/account/update/(:num)', 'CustomerAccounts::update/$1');

$routes->post('/account/delete/(:num)', 'CustomerAccounts::delete/$1');

