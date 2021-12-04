<?php

class CommentManager
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo=$pdo;
    }

    /**
     * @return Comment
     */
    public function getCommentByPostID(int $postId)
    {
        $query = 'SELECT c.*, CONCAT(u.firstName," ",u.lastName) AS username FROM comment c JOIN user u ON c.author = u.id WHERE c.postId = :postId';
        $response = $this->pdo->prepare($query);
        $response->bindValue(':postId', $postId, PDO::PARAM_INT);
        $response->setFetchMode(PDO::FETCH_CLASS, 'Entity\Comment');
        $response->execute();
        return $response->fetchAll();
    }
}