<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

$app->post('/add', function (Request $request, Response $response) {
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    $parsedBody = $request->getParsedBody();
    $taskText = trim($parsedBody['task'] ?? '');

    if (!empty($taskText)) {
        $_SESSION['tasks'][] = ['id' => uniqid(), 'task' => htmlspecialchars($taskText)];
    }

    $response->getBody()->write(renderView('partials/task-list.php', ['tasks' => $_SESSION['tasks']]));
    return $response;
});