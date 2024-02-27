<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

include_once("Alunno.php");
include_once("Classe.php");

require __DIR__ . '/vendor/autoload.php';

$app = AppFactory::create();

$app->get('/', function (Request $request, Response $response, $args) {
    $response->getBody()->write("Hello world!");
    return $response;
});


$app->get('/alunni', function (Request $request, Response $response, $args) {
    $classe = new Classe("5dia");
    $body = $classe->getAll();
    $response->getBody()->write($body);
    return $response;
});

$app->get('/alunno/{cf}', function (Request $request, Response $response, $args) {
    $classe = new Classe("5dia");
    $cf = $args['cf'];
    $al = $classe->getAlunno($cf);
    $body = $al == "none" ? "nessun alunno trovato" : $al;
    $response->getBody()->write($body);
    return $response;
});

$app->run();
