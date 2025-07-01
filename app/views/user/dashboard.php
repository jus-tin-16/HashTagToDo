<?php include BASE_PATH . '/app/views/layouts/header.php'; ?>
<div class="dashboard-container">
    <?php display_flash_messages(); ?>
    <h2>Welcome to Your Dashboard, <?php echo htmlspecialchars($_SESSION['name']); ?>!</h2>
    <p>Manage your tasks efficiently.</p>

    <div class="todo-section">
        <h3>Your To-Do List</h3>
        <form action="/<?php echo basename(BASE_PATH); ?>/add_todo" method="POST" class="add-todo-form">
            <input type="text" name="todo_item" placeholder="Add a new task..." required>
            <button type="submit">Add Task</button>
        </form>

        <ul class="todo-list">
            <li class="todo-item">
                <span class="todo-text"> # CAP101: Chapters 1-3</span>
                <div class="todo-actions">
                    <button class="complete-btn">Complete</button>
                    <button class="delete-btn">Delete</button>
                </div>
            </li>
            <li class="todo-item completed">
                <span class="todo-text"># ERD and DFD</span>
                <div class="todo-actions">
                    <button class="complete-btn" disabled>Completed</button>
                    <button class="delete-btn">Delete</button>
                </div>
            </li>
            <li class="todo-item">
                <span class="todo-text"># Call John Doe</span>
                <div class="todo-actions">
                    <button class="complete-btn" >Complete</button>
                    <button class="delete-btn">Delete</button>
                </div>
            </li>
        </ul>
        <p class="no-tasks-message" style="display: none;">No tasks yet! Add one above.</p>
    </div>

    <div class="dashboard-links">
        <p><a href="/<?php echo basename(BASE_PATH); ?>/profile">View/Edit Profile</a></p>
    </div>
</div>
<?php include BASE_PATH . '/app/views/layouts/footer.php'; ?>