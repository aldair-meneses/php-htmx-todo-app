<li>
    <p><?php echo htmlspecialchars($task['task']); ?></p>
    <div class="task-actions">
        <button
            class="edit-button"
            hx-get="/edit/<?php echo $task['id']; ?>"
            hx-target="closest li"
            hx-swap="outerHTML">Editar
        </button>
        <button
            class="delete-button"
            hx-post="/delete/<?php echo $task['id']; ?>"
            hx-target="closest li"
            hx-swap="outerHTML">Delete
        </button>
    </div>
</li>
