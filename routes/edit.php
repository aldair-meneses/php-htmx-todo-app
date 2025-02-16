<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

$app->get('/edit/{id}', function (Request $request, Response $response, $args) {
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    $taskId = $args['id'];
    $task = null;
    foreach ($_SESSION['tasks'] as $t) {
        if ($t['id'] === $taskId) {
            $task = $t;
            break;
        }
    }

    if (!$task) {
        return $response->withStatus(404);
    }

    $response->getBody()->write(renderView('partials/edit-task.php', ['task' => $task]));
    return $response;
});

