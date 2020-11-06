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

$app->redirect('/2021/intro[/]', '/audios/intro.mp3');
$app->redirect('/2021/jan[/]', '/audios/1-jan.mp3');
$app->redirect('/2021/fev[/]', '/audios/2-fev.mp3');
$app->redirect('/2021/mar[/]', '/audios/3-mar.mp3');
$app->redirect('/2021/abr[/]', '/audios/4-abr.mp3');
$app->redirect('/2021/mai[/]', '/audios/5-mai.mp3');
$app->redirect('/2021/jun[/]', '/audios/6-jun.mp3');
$app->redirect('/2021/jul[/]', '/audios/7-jul.mp3');
$app->redirect('/2021/ago[/]', '/audios/8-ago.mp3');
$app->redirect('/2021/set[/]', '/audios/9-set.mp3');
$app->redirect('/2021/out[/]', '/audios/10-out.mp3');
$app->redirect('/2021/nov[/]', '/audios/11-nov.mp3');
$app->redirect('/2021/dez[/]', '/audios/12-dez.mp3');

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