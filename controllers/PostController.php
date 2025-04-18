<?php
require_once '../config/database.php';
require_once '../models/Post.php';

class PostController
{
    private $conn;

    public function __construct()
    {
        $db = new Database();
        $this->conn = $db->connect();
    }

    public function create($postData, $userId)
    {
        $title = trim($postData['title']);
        $description = trim($postData['description']);
        $errors = [];

        if (empty($title)) {
            $errors[] = "A cím megadása kötelező.";
        }

        if (empty($description)) {
            $errors[] = "A leírás megadása kötelező.";
        }

        if (empty($errors)) {
            $postModel = new Post($this->conn);
            $success = $postModel->createPost($userId, $title, $description);

            if (!$success) {
                $errors[] = "Hiba történt a mentés közben.";
            }
        }

        return $errors;
    }

    public function getAllPosts()
    {
        $postModel = new Post($this->conn);
        return $postModel->getAllPosts();
    }
}
