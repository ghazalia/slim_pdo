<?php

use Slim\Http\Request;
use Slim\Http\Response;
use  App\Models\UsersController;

$app->get('/', function (Request $request, Response $response) {
    $response->getBody()->write("It works! This is the default welcome page.");

    return $response;
})->setName('root');

$app->get('/hello/{name}', function (Request $request, Response $response) {
    $name = $request->getAttribute('name');
    $response->getBody()->write("Hello, $name");

    return $response;
});

$app->get('/user', function ($request, $response) {
    $mapper = new UsersController($this->get('pdo'));
    return $response->withJson($mapper->getAllUsers());
});

$app->get('/user/{id}', function ($request, $response) {
    $mapper = new UsersController($this->get('pdo'));
    return $response->withJson($mapper->getUser($request->getAttribute('id')));
});