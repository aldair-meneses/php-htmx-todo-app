<li>
    <input type="text"
        name="task"
        value="<?php echo htmlspecialchars($task['task']); ?>"
        id="edit-input-<?php echo $task['id']; ?>"
        autofocus>
    <div class="task-actions">
        <button
            hx-post="/update/<?php echo $task['id']; ?>"
            hx-target="closest li"
            hx-swap="outerHTML"
            hx-include="#edit-input-<?php echo $task['id']; ?>">Salvar
        </button>
        <button
            hx-get="/tasks/<?php echo $task['id']; ?>"
            hx-target="closest li"
            hx-swap="outerHTML">Cancelar
        </button>
    </div>
</li>