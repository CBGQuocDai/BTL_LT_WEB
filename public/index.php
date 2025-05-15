<?php

// Bắt đầu session nếu cần
// session_start();

// Tải autoloader của Composer
require_once __DIR__ . '/../vendor/autoload.php';

// Tải biến môi trường từ file .env
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

// Khởi tạo Router và điều hướng request
// Ví dụ:
// $router = new App\Core\Router();
// require_once __DIR__ . '/../src/routes.php'; // File định nghĩa các routes
// $uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
// $method = $_SERVER['REQUEST_METHOD'];
// $router->dispatch($uri, $method);
?>
