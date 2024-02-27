<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

include("controllers/SiteController.php");
include("controllers/AlunniController.php");
//include("controllers/AlunniApiController.php");

require __DIR__ . '/vendor/autoload.php';

$app = AppFactory::create();

$app->get('/',"SiteController:index");
$app->get('/alunni',"AlunniController:index");
$app->get('/alunni/{cf}',"AlunniController:show");
//$app->get('/api/alunni',"Sitecontroller:index");
//$app->get('/api/alunni/{cf}',"Sitecontroller:index");

$app->get('/alunni', function (Request $request, Response $response, $args) {
    $classe = new Classe("5dia");
    $body = $classe->getAll();
    $response->getBody()->write($body);
    return $response;
});

$app->get('/alunni/{cf}', function (Request $request, Response $response, $args) {
    $classe = new Classe("5dia");
    $cf = $args['cf'];
    $al = $classe->getAlunno($cf);
    $body = $al == "none" ? "nessun alunno trovato" : $al;
    $response->getBody()->write($body);
    return $response;
});

$app->run();
