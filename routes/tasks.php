<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

$app->get('/tasks', function (Request $request, Response $response) {
    $response->getBody()->write(renderView('partials/task_list.php', ['tasks' => $_SESSION['tasks']]));
    return $response;
});