<?php

// CRUD
// User:
// Get -> INDEX -> Danh sach
// Get -> CREATE -> Tao
// Post -> store -> lưu dữ liệu
// get -> show/id -> xem chi tiet
// get -> id/edit -. hiển thị form cập nahatj
// port -> store -> luu du lieu

use Danghau\Playfinal\Controllers\Admin\UserController;

$router->mount('/admin', function () use ($router) {

    // CRUD USER
    $router->mount('/users', function () use ($router) {
        $router->get('/',           UserController::class . '@index');
        $router->get('/create',     UserController::class . '@create');
        $router->post('/store',     UserController::class . '@store');
        $router->get('/{id}',       UserController::class . '@show');
        $router->get('/{id}/edit',  UserController::class . '@edit');
        $router->put('/{id}',       UserController::class . '@update');
        $router->delete('/{id}',    UserController::class . '@delete');
    });
});
