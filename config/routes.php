<?php

use App\Router\Route;

return [
    new Route('/', 'GET', 'App\Controller\HttpController', 'index'),
];
