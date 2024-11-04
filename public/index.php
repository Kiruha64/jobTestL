<?php
// public/index.php

// Include the UserController class
require_once __DIR__ . '/../src/services/UserService.php';
// Get the URI path
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Route handling
if ($uri == '/' || $uri == '/user/form') {
    // Show the form
    $controller = new \services\UserService();
    $controller->showForm();
} else {
    // If the route is not found, display a 404 message
    http_response_code(404);
    echo "Page not found";
}
