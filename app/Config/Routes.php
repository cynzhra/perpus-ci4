<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->setAutoRoute(true);

$routes->get('/', 'User::index');

$routes->get('/admin', 'Admin::index', ['filter' => 'role:admin']);
$routes->get('/admin/index', 'Admin::index', ['filter' => 'role:admin']);
$routes->get('/admin/(:num)', 'Admin::detail/$1', ['filter' => 'role:admin']);

$routes->get('/book', 'Book::index');
$routes->get('/book/add', 'Book::add');
$routes->get('/book/edit/(:segment)', 'Book::edit/$1');
$routes->delete('/book/(:num)', 'Book::delete/$1');
$routes->get('/book/export', 'Book::export');
$routes->get('/book/(:any)', 'Book::detail/$1');

$routes->get('/category', 'Category::index');