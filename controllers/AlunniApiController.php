<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/vendor/autoload.php';

include_once("Alunno.php");
include_once("Classe.php");

class AlunniApiController{
    public function index(Request $request, Response $response, $args){}
    public function show(Request $request, Response $response, $args){}
}

?>