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
    public function getAllPosts(/*int $number = null*/)//:array
    {
        $query = 'SELECT * FROM `post`';
        $response = $this->pdo->query($query);
        return $response->fetchAll(PDO::FETCH_CLASS, 'Entity\Post');

        /*if ($number) {
            $query = $this->db->prepare('SELECT * FROM post ORDER BY id DESC LIMIT :limit');
            $query->bindValue(':limit', $number, \PDO::PARAM_INT);
            $query->execute();
        } else {
            $query = $this->db>query('SELECT * FROM post ORDER BY id DESC');
        }
        $query->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, 'Entity\Post');
        return $query->fetchAll();*/

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