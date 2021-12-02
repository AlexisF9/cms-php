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
    public function getCommentByID(int $id)
    {
        $query = 'SELECT * FROM `comment` WHERE post_id = :post_id';
        $response = $this->pdo->prepare($query);
        $response->bindValue(':post_id', $post_id, PDO::PARAM_INT);
        $response->setFetchMode(PDO::FETCH_CLASS, 'Entity\Comment');
        $response->execute();
        return $response->fetch();
    }
}