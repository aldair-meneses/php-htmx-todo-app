<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

$app->post('/update/{id}', function (Request $request, Response $response, $args) {
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    $taskId = $args['id'];
    $data = $request->getParsedBody();
    $updatedTask = $data['task'] ?? '';

    foreach ($_SESSION['tasks'] as &$task) {
        if ($task['id'] === $taskId) {
            $task['task'] = $updatedTask;
            break;
        }
    }

    $response->getBody()->write(renderView('partials/item.php', ['task' => ['id' => $taskId, 'task' => $updatedTask]]));
    return $response;
});
