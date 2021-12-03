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
        $query = 'SELECT p.*, CONCAT(u.firstName," ",u.lastName) AS username FROM post p JOIN user u ON p.author = u.id;';
        $response = $this->pdo->query($query);
        return $response->fetchAll(PDO::FETCH_CLASS, 'Entity\Post');

    }

    /**
     * @return Post
     */
    public function getPostByID(int $id)
    {
        $query = 'SELECT p.*, CONCAT(u.firstName," ",u.lastName) AS username FROM post p JOIN user u ON p.author = u.id WHERE p.id = :id';
        $response = $this->pdo->prepare($query);
        $response->bindValue(':id', $id, PDO::PARAM_INT);
        $response->setFetchMode(PDO::FETCH_CLASS, 'Entity\Post');
        $response->execute();
        return $response->fetch();
    }
}