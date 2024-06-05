<?php

use Danghau\Playfinal\Controllers\Client\AuthController;
use Danghau\Playfinal\Controllers\Client\HomeController;

$router->get('/', HomeController::class . '@index');

$router->mount('/auth', function () use ($router) {

    $router->get('/login',         AuthController::class         . '@showFormLogin');
    $router->post('/handle-login', AuthController::class         . '@login');
    $router->get('/logout',        AuthController::class         . '@logout');
});

// $router->get('/auth/login',         AuthController::class         . '@showFormLogin');
// $router->post('/auth/handle-login', AuthController::class         . '@login');
// $router->get('/auth/logout',        AuthController::class         . '@logout');
