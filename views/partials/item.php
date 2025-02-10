<li>
    <p><?php echo htmlspecialchars($task['task']); ?></p>
    <button
        class="delete-button"
        hx-post="/delete/<?php echo $task['id']; ?>"
        hx-target="closest li"
        hx-swap="outerHTML">Delete</button>
</li>
