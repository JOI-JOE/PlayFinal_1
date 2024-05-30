<?php
$router = new \Bramus\Router\Router();

// tách rieeng ra
require_once __DIR__ . '/admin.php';
require_once __DIR__ . '/client.php';

$router->run();
