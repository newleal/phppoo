<?php

require_once __DIR__ . '/Database.php';

class User{

    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function register($nombre, $email, $password)
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $this->db->prepare("INSERT INTO users (nombre, email, password) VALUES(:nombre, :email, :password)");
        return $stmt->execute(['nombre' => $nombre, 'email' => $email, 'password' => $hashedPassword]);

    }

    public function login($email, $password)
    {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        echo var_dump($user);
        if($user && password_verify($password, $user['password']))
        {
            return $user;
        }
        return false;
        

    }

    public function getUser($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE id= :id");
        $stmt->execute(['id' => $id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

?>