<?php

class Router
{
    private $routes;

    public function __construct(array $routes)
    {
        $this->routes = $routes;
    }

    public function handleRequest()
    {
        $url = $this->sanitizeUrl($_GET['url'] ?? '/');

        if ($this->isValidUrl($url)) {
            $this->routeRequest($url);
        } else {
            $this->showError('Invalid URL');
        }
    }

    private function sanitizeUrl($url)
    {
        return htmlspecialchars($url);
    }

    private function isValidUrl($url)
    {
        return preg_match('/^[a-zA-Z0-9\/]+$/', $url);
    }

    private function routeRequest($url)
    {
        if (array_key_exists($url, $this->routes)) {
            list($folder, $file) = array_map('htmlspecialchars', explode('/', $this->routes[$url], 2));
            $filePath = 'app/' . $folder . '/' . $file;

            $this->includeFile($filePath);
        } else {
            $this->showError('404 Not Found');
        }
    }

    private function includeFile($filePath)
    {
        if (file_exists($filePath)) {
            include $filePath;
        } else {
            $this->showError('404 Not Found');
        }
    }

    private function showError($message)
    {
        echo $message;
        exit;
    }
}

$routes = [
    'back/login' => 'modules/auth/login.php',
    'back/register' => 'modules/auth/register.php',
    'back/add' => 'modules/products/add.php',
    'home/' => 'views/home.php',
    '/' => 'views/index.php',
];

$router = new Router($routes);
$router->handleRequest();
