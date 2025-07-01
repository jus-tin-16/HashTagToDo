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
            <?php if (!empty($userTasks)) {
                foreach ($userTasks as $task) {
                    if ($task['status'] == 'Not Completed'){
                        echo '<li class="todo-item">';
                        echo '<span class="todo-text"> # ' . $task["taskName"] .'</span>';
                        echo '<div class="todo-actions">';
                        echo '<button class="complete-btn">Complete</button>';
                        echo '<button class="delete-btn">Delete</button>';
                        echo '</div>';
                        echo '</li>';
                    } else {
                        echo '<li class="todo-item completed">';
                        echo '<span class="todo-text"> # ' . $task["taskName"] .'</span>';
                        echo '<div class="todo-actions">';
                        echo '<button class="complete-btn" disabled>Complete</button>';
                        echo '<button class="delete-btn">Delete</button>';
                        echo '</div>';
                        echo '</li>';
                    }
                }
            } else { 
                echo '<p class="no-tasks-message" >No tasks yet! Add one above.</p>';
            }
            ?>
        </ul>
    </div>

    <div class="dashboard-links">
        <p><a href="/<?php echo basename(BASE_PATH); ?>/profile">View/Edit Profile</a></p>
    </div>
</div>
<?php include BASE_PATH . '/app/views/layouts/footer.php'; ?>