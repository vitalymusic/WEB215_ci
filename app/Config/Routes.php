<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::news');
$routes->get('/news', 'Home::news');
$routes->get('/contacts', 'Home::contacts');
$routes->get('/get_news_comments/(:num)', 'Home::get_news_comments/$1');


$routes->post('/addUser', 'Home::addUser');
$routes->post('/add_comment', 'Home::addComment');




// Admin panel Routes
$routes->get('/admin', 'Admin::index');
$routes->get('/add_news', 'Admin::add_news');
$routes->post('/news/add', 'Admin::add_news_db');
