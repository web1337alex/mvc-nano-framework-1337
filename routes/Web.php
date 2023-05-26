<?php

namespace Routes;

use App\Controllers\MainController;

class Web
{
    private array $routes = [
        '/' => [
            'methods' => [
                'POST' => [MainController::class, 'save'],
                'GET' => [MainController::class, 'index']
            ]
        ],
    ];

    public function __construct()
    {
        if(!isset($this->routes[$_SERVER['REQUEST_URI']]['methods'][$_SERVER['REQUEST_METHOD']])){
            abort();
        }
        $routeData = $this->routes[$_SERVER['REQUEST_URI']]['methods'][$_SERVER['REQUEST_METHOD']];


        $controller = new $routeData[0];
        $controller->{$routeData[1]}();
    }

    private function init($requestURI): void
    {


    }
}