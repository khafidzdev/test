<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['login'] = 'auth/login';
$route['register'] = 'auth/register';
$route['logout'] = 'auth/logout';

$route['products'] = 'products/index';
$route['product/(:num)'] = 'products/show/$1';

$route['cart'] = 'cart/index';
$route['cart/add/(:num)'] = 'cart/add/$1';
$route['cart/remove/(:num)'] = 'cart/remove/$1';

$route['checkout'] = 'checkout/index';

$route['vendor'] = 'vendor/index';
$route['vendor/products/create'] = 'vendor/createProduct';
$route['vendor/products/(:num)/edit'] = 'vendor/editProduct/$1';

$route['migrate'] = 'migrate/index';
