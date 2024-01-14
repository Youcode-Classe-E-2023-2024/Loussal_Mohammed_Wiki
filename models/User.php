<?php

class User
{
    public $id;
    public $email;
    public $picture;
    public $username;
    private $password;

    public function __construct($id)
    {
        global $db;

        $stmt = $db->prepare("SELECT * FROM users WHERE user_id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->id = $user['user_id'];
        $this->picture = $user['user_picture'];
        $this->email = $user['email'];
        $this->username = $user['username'];
        $this->password = $user['password'];
    }
    static function getUser($id)
    {
        global $db;
        $stmt = $db->prepare("SELECT * FROM users WHERE user_id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    static function getAll()
    {
        global $db;
        $stmt = $db->query("SELECT * FROM users");
        if ($stmt)
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    
}