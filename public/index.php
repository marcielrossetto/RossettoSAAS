<?php
require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../app/Config/app.php';
require __DIR__ . '/../app/Core/Router.php';
require __DIR__ . '/../app/Core/ApiRouter.php';
require __DIR__ . '/../app/bootstrap.php';
require __DIR__ . '/../app/bootstrap.php';

use App\Core\Router;
use App\Core\ApiRouter;

$router = new Router();
$api = new ApiRouter();

// Rotas padrão (Dashboard, Reservas, Login, Logout)
$router->handle();

// Rotas da API (JWT)
$api->handle();
