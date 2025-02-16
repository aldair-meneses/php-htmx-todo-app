<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

$app->get('/tasks[/{id}]', function (Request $request, Response $response, $task) {
    
    if ( $task ) {
        $taskId = $task['id'];

        foreach ( $_SESSION['tasks'] as $t ) {
            if ( $t['id'] === $taskId ) {
                $task = $t;
                break;
            }
        }
    
        if (!$task) {
            return $response->withStatus(404);
        }
    
        $response->getBody()->write(renderView('partials/item.php', ['task' => $task]));
        return $response;
    }

    $response->getBody()->write(renderView('partials/task-list.php', ['tasks' => $_SESSION['tasks']]));
    return $response;
});