<?php

include __DIR__ . '/vendor/autoload.php';

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$app = AppFactory::create();

$app->addRoutingMiddleware();
$app->addBodyParsingMiddleware();

if (!isset($_SESSION['tasks'])) {
    $_SESSION['tasks'] = [];
}

$app->addErrorMiddleware(true, true, true);

include __DIR__ . '/routes/tasks.php';
include __DIR__ . '/routes/add.php';
include __DIR__ . '/routes/delete.php';

$app->get('/', function (Request $request, Response $response) {
    $response->getBody()->write(renderView('index.html', []));
    return $response;
});

$app->run();

function renderView($view, $data) {
    extract($data);
    ob_start();
    include __DIR__ . "/views/$view";
    return ob_get_clean();
}
