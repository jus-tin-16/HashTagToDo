<?php
class TaskController {
    public function add_todo() {
        $taskModel = new Task;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $taskName = trim($_POST['todo_item']);

            if (empty($taskName)){
                flash('error', 'task item must be included');
                redirect('dashboard');
            }

            if ($taskModel->createTask($taskName, $_SESSION['user_Id'])){
                flash('success', 'Task successfully added!');
                redirect('dashboard');
            }
        }
    }
}
?>