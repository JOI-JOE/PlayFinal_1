<?php

use Danghau\Playfinal\Controllers\Client\AuthController;
use Danghau\Playfinal\Controllers\Client\CartController;
use Danghau\Playfinal\Controllers\Client\HomeController;
use Danghau\Playfinal\Controllers\Client\OrderController;
use Danghau\Playfinal\Controllers\Client\ProductController;

$router->get('/', HomeController::class . '@index');

$router->mount('/auth', function () use ($router) {

    $router->get('/login',         AuthController::class         . '@showFormLogin');
    $router->post('/handle-login', AuthController::class         . '@login');
    $router->get('/logout',        AuthController::class         . '@logout');
});


$router->get('/products',          ProductController::class . "@shop");
$router->get('/products/{id}',     ProductController::class . "@detail");

$router->get('/cart/add',         CartController::class         . '@add');
$router->get('/cart/quantityDec', CartController::class         . '@quantityDec');
$router->get('/cart/quantityInc', CartController::class         . '@quantityInc');
$router->get('/cart/remove',      CartController::class         . '@remove');
$router->get('/cart/detail',      CartController::class         . '@detail');

$router->post('/order/checkout',   OrderController::class         . '@checkout');
