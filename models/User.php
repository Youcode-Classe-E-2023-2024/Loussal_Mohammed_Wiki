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

    function login ($user_id, $access) {
        if($access === "dashboard")
            $_SESSION["admin"] = true;
        $_SESSION["user_id"] = $user_id;
        $_SESSION["login"] = true;
    }

    function logout () {
        session_destroy();
        header('Location: index.php');
    }

    static function user_checker($email, $db)
    {
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result)
            return $result;
        return false;
    }

    static function register($username, $email, $password, $picture, $db)
    {
        $sql = "INSERT INTO users (username, email, password, user_picture) VALUES (:username, :email, :password, :picture)";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':picture', $picture);
        $stmt->execute();
    }

            
}