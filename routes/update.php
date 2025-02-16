<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

$app->post('/update/{id}', function (Request $request, Response $response, $args) {
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    $taskId = $args['id'];
    $parsedBody = $request->getParsedBody();
    $updatedText = trim($parsedBody['task'] ?? '');

    if (empty($updatedText)) {
        $response->getBody()->write("Task cannot be empty!");
        return $response->withStatus(400);
    }

    foreach ($_SESSION['tasks'] as &$task) {
        if ($task['id'] === $taskId) {
            $task['task'] = htmlspecialchars($updatedText);
            break;
        }
    }

    $updatedTask = array_values(array_filter($_SESSION['tasks'], fn($t) => $t['id'] === $taskId))[0] ?? null;

    $response->getBody()->write(renderView('partials/item.php', ['task' => $updatedTask]));
    return $response;
});
