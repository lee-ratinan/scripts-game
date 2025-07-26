<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->post('/login', 'Home::login');
$routes->get('/japanese', 'Japanese::index');
$routes->get('/japanese/review', 'Japanese::review');
$routes->get('/japanese/entry/(:any)/(:any)', 'Japanese::entry/$1/$2');
$routes->get('/japanese/game/(:any)/(:any)', 'Japanese::game/$1/$2');