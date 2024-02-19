# PHP-Router
Lightweight, easy-to-use router designed to handle web requests in PHP applications. This project provides a simple solution to organize and direct traffic in your web application, making it easy to manage routes and including the corresponding files.

# Key Features
**Easy Configuration:** Define your routes clearly and concisely.

**Modular Structure:** Organize your code by mapping routes to specific files.

**URL Validation:** Ensure that URLs adhere to alphanumeric and slash standards.

**Error Handling:** Display customizable messages for invalid URLs or not found resources.

# Quick Start

1 Define Routes:
```php
$routes = [
    'back/login' => 'modules/auth/login.php',
    'back/registro' => 'modules/auth/registro.php',
    'back/add' => 'modules/products/add.php',
    'home/' => 'views/home.php',
    '/' => 'views/index.php',
];
```

2 Handle Requests:
```php
$router = new Router($routes);
$router->handleRequest();
```
