<?php

use Slim\Factory\AppFactory;

include("./controllers/SiteController.php");
include("./controllers/AlunniController.php");
include("./controllers/AlunniApiController.php");

require __DIR__ . '/vendor/autoload.php';

$app = AppFactory::create();

$app->get('/',"SiteController:index");
$app->get('/alunni',"AlunniController:index");
$app->get('/alunni/{cf}',"AlunniController:show");
$app->get('/api/alunni/{cf}',"AlunniApiController:show");
$app->get('/api/alunni',"AlunniApiController:index");
$app->run();
