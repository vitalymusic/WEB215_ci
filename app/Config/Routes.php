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

