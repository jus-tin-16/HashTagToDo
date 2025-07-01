<?php
class Task {
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function createTask($taskName, $userId){
        $stmt = $this->db->prepare("INSERT INTO tasks (taskName, userId) VALUES (?, ?)");
        return $stmt->execute([$taskName, $userId]);
    }

    public function getTask($userId) {
        $stmt = $this->db->prepare("SELECT * FROM tasks WHERE userId = ?");
        $stmt->execute([$userId]);
        return $stmt->fetchAll();
    }
}
?>