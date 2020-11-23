<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

use Slim\Factory\AppFactory;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();

$loader = new FilesystemLoader('../templates/', __DIR__);
$twig = new Environment($loader);

$app->redirect('/', 'https://www.youtube.com/channel/UCNi0W4h3iG0dRfczka8_v1A');
$app->redirect('/2021/intro[/]', 'https://www.youtube.com/watch?v=IKA-irhSXEY');
$app->redirect('/2021/jan[/]',   'https://www.youtube.com/watch?v=lRAhTRZdx9o');
$app->redirect('/2021/fev[/]',   'https://www.youtube.com/watch?v=f9Y-HzkRoGg');
$app->redirect('/2021/mar[/]',   'https://www.youtube.com/watch?v=1HG9W6iyiO0');
$app->redirect('/2021/abr[/]',   'https://www.youtube.com/watch?v=XIhrdpAtxDQ');
$app->redirect('/2021/mai[/]',   'https://www.youtube.com/watch?v=BF_O40b3I3w');
$app->redirect('/2021/jun[/]',   'https://www.youtube.com/watch?v=Lsh1wm4YprM');
$app->redirect('/2021/jul[/]',   'https://www.youtube.com/watch?v=LAa7Oweg2sk');
$app->redirect('/2021/ago[/]',   'https://www.youtube.com/watch?v=dyLtwi39cHU');
$app->redirect('/2021/set[/]',   'https://www.youtube.com/watch?v=QaVaUcAbrw4');
$app->redirect('/2021/out[/]',   'https://www.youtube.com/watch?v=CuTGKHStLO0');
$app->redirect('/2021/nov[/]',   'https://www.youtube.com/watch?v=RcHqGmTohPA');
$app->redirect('/2021/dez[/]',   'https://www.youtube.com/watch?v=lW-sDasKa-A');

$errorMid = $app->addErrorMiddleware(true, true, true);
$errorMid->setDefaultErrorHandler(function () use ($app, $twig) {
    $body = $twig->render('2021.twig', ['message' => '💚']);
    $response = $app->getResponseFactory()->createResponse();
    $response->getBody()->write($body);
    return $response;
});

$app->run();