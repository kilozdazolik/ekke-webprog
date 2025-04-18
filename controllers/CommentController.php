<?php

require_once '../models/Comment.php';

class CommentController
{
    private $commentModel;

    public function __construct($dbConnection)
    {
        $this->commentModel = new Comment($dbConnection);
    }

    public function addComment($postId, $userId, $content)
    {
        return $this->commentModel->addComment($postId, $userId, $content);
    }

    public function getComments($postId, $order = 'DESC')
    {
        return $this->commentModel->getCommentsByPostId($postId, $order);
    }
}
