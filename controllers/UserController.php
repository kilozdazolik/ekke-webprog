<?php
require_once '../config/database.php';
require_once '../models/User.php';

class UserController
{
    private $conn;

    public function __construct()
    {
        $db = new Database();
        $this->conn = $db->connect();
    }

    public function register($postData)
    {
        $username = trim($postData['username']);
        $password = $postData['password'];
        $passwordConfirm = $postData['passwordConfirm'];

        $errors = [];

        if ($password !== $passwordConfirm) {
            $errors[] = "A jelszavak nem egyeznek.";
        }

        if (empty($errors)) {
            $userModel = new User($this->conn);

            if ($userModel->userExists($username)) {
                $errors[] = "Ez a felhasználónév már foglalt.";
            } else {
                $userModel->register($username, $password);
            }
        }

        return $errors;
    }

    public function login($data)
    {
        session_start();
        $errors = [];

        if (empty($data['username']) || empty($data['password'])) {
            $errors[] = "Felhasználónév és jelszó szükséges!";
        }

        if (empty($errors)) {
            $userModel = new User($this->conn);
            $user = $userModel->getUserByUsername($data['username']);

            if ($user && password_verify($data['password'], $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                header('Location: ../views/index.php');
                exit;
            } else {
                $errors[] = "Hibás felhasználónév vagy jelszó!";
            }
        }

        return $errors;
    }
}
