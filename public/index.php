<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();

$app->get(
    '/',
    function (Request $request, Response $response, $args) {
        $response->getBody()->write("Espaço especial para arquivos do calendário anabá 2021 💚");
        return $response;
    }
);

$app->get(
    '/2021/{month}',
    function (Request $request, Response $response, $args) {
        $month = $args['month'];

        if (!in_array($month, ['jan', 'fev', 'mar', 'abr', 'mai', 'jun', 'jul', 'ago', 'set', 'out', 'nov', 'dez'])) {
            $response->getBody()->write('Página não disponível');
            return $response;
        }

        $response->getBody()->write($month);
        return $response;
    }
);

$app->run();