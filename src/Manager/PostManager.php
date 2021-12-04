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

    public function setMyPost($title, $content, $author, $img)
    {

        $check = $this->pdo->prepare('SELECT title FROM post WHERE title = ?');
        $check->execute(array($title));
        $check->fetch(); 
        $row = $check->rowCount();

        if($row == 0) {
            $insert = $this->pdo->prepare('INSERT INTO post(title, content, author, img) VALUES(?, ?, ?, ?)');
            $insert -> execute(array($title, $content, $author, $img));
            return true;
        } else {
            return false;
        }
        
        
    }
}