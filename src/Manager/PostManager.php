<?php

class PostManager
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo=$pdo;
    }

    /**
     * @return Post[]
     */
    public function getAllPosts()//:array
    {
        $query = 'SELECT * FROM `post`';
        $response = $this->pdo->query($query);
        return $response->fetchAll(PDO::FETCH_CLASS, 'Entity\Post');

    }

    /**
     * @return Post
     */
    public function getPostByID(int $id)
    {
        $query = 'SELECT * FROM `post` WHERE id = :id';
        $response = $this->pdo->prepare($query);
        $response->bindValue(':id', $id, PDO::PARAM_INT);
        $response->setFetchMode(PDO::FETCH_CLASS, 'Entity\Post');
        $response->execute();
        return $response->fetch();
    }
}