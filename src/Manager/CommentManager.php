<?php

class CommentManager
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo=$pdo;
    }

    /**
     * @return Comment[]
     */
    public function getCommentByID(int $postId)
    {
        $query = 'SELECT * FROM `comment` WHERE postId = :postId';
        $response = $this->pdo->prepare($query);
        $response->bindValue(':postId', $postId, PDO::PARAM_INT);
        $response->setFetchMode(PDO::FETCH_CLASS, 'Entity\Comment');
        $response->execute();
        return $response->fetch();
    }
}