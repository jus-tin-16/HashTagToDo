<?php
//This will interact to users table (SQL Queries in Object Format)
class User{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    //register User
    public function createUser($name, $email, $password) {
        $stmt = $this->db->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
        return $stmt->execute([$name, $email, $password]);
    }

    //Check if email does already exist
    public function findByEmail($email) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch();
    }

    public function getUserById($id) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE user_Id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function updateProfile($user_Id, $name, $email) {
        // Example: Only update username and email
        $stmt = $this->db->prepare("UPDATE users SET name = ?, email = ? WHERE user_Id = ?");
        return $stmt->execute([$name, $email, $user_Id]);
    }

    public function findByUsername($name) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE name = ?");
        $stmt->execute([$name]);
        return $stmt->fetch();
    }
}
?>