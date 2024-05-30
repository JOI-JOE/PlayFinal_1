<?php

use Danghau\Playfinal\Controllers\Client\AboutController;
use Danghau\Playfinal\Controllers\Client\ContactController;
use Danghau\Playfinal\Controllers\Client\HomeController;
use Danghau\Playfinal\Controllers\Client\ProductController;

// Create Router instance
// website có các trang là 
/*
trang chủ
giới tiệu
sản phẩm
chi tiết sản phẩm 
lieent hệ

để định nghĩa được phải tảo controller trước đã
*/

// HTTP method : get, post, put, delete , option , 


$router->get('/',              HomeController::class    . '@index');
$router->get('/about',         AboutController::class   . '@index');

$router->get('/contact',        ContactController::class . '@index');
$router->post('/contact/store', ContactController::class . '@store');

$router->get('/products',      ProductController::class . '@index');
$router->get('/products/{id}', ProductController::class . '@store');
