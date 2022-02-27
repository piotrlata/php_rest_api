<?php

include_once __DIR__.'/../vendor/autoload.php';

use app\config\Router;
use app\controllers\CategoryController;
use app\controllers\VideoController;

$router = new Router();

$router->get('/', [new CategoryController(), 'index']);
$router->get('/categories', [new CategoryController(), 'index']);
$router->get('/categories/create', [new CategoryController(), 'create']);
$router->post('/categories/create', [new CategoryController(), 'create']);
$router->post('/categories/delete', [new CategoryController(), 'delete']);
$router->get('/categories/videos', [new CategoryController(), 'view']);
$router->get('/categories/videos/view', [new VideoController(), 'view']);
$router->get('/categories/videos/create', [new VideoController(), 'create']);
$router->post('/categories/videos/create', [new VideoController(), 'create']);
$router->post('/categories/videos/delete', [new VideoController(), 'delete']);

$router->resolve();