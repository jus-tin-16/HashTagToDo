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
}
?>