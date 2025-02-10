<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

$app->post('/delete/{id}', function (Request $request, Response $response, $args) {
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    $taskId = $args['id'];
    $_SESSION['tasks'] = array_filter($_SESSION['tasks'], fn($task) => $task['id'] !== $taskId);

    $response->getBody()->write('');
    return $response;
});