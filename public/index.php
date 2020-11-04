<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();

$loader = new FilesystemLoader('../templates/', __DIR__);
$twig = new Environment($loader);

$app->get(
    '/',
    function (Request $request, Response $response, $args) use ($twig) {
        $body = $twig->render('2021.twig', ['message' => 'Anabá 2021 💚']);
        $response->getBody()->write($body);
        return $response;
    }
);

$app->redirect('/2021/jan[/]', '/assets/img/jan.jpg');
$app->redirect('/2021/fev[/]', 'https://www.youtube.com/watch?v=epkRpbTv44Y');
$app->redirect('/2021/out[/]', '/assets/audio/set.mp3');

$app->get(
    '/2021/{month}[/]',
    function (Request $request, Response $response, $args) use ($app, $twig) {
        $month = $args['month'];

        if (!in_array($month, ['intro', 'mar', 'abr', 'mai', 'jun', 'jul', 'ago', 'set', 'nov', 'dez'])) {
            $body = $twig->render('2021.twig', ['message' => 'Nada aqui ...']);
            $response->getBody()->write($body);
            return $response;
        } else {
            if($month === 'set') {
                $body = $twig->render('2021-set.twig');
            } else {
                $body = $twig->render('2021.twig', ['message' => $month]);
            }

            $response->getBody()->write($body);
        }

        return $response;
    }
);

$errorMid = $app->addErrorMiddleware(true, true, true);
$errorMid->setDefaultErrorHandler(function () use ($app, $twig) {
    $body = $twig->render('2021.twig', ['message' => '💚']);
    $response = $app->getResponseFactory()->createResponse();
    $response->getBody()->write($body);
    return $response;
});

$app->run();