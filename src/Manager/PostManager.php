<?php

class PostManager
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo=$pdo;
    }

    public function getAllPosts(): array
    {
        $query = 'SELECT p.*, CONCAT(u.firstName," ",u.lastName) AS username FROM post p JOIN user u ON p.author = u.id;';
        $response = $this->pdo->query($query);
        return $response->fetchAll(PDO::FETCH_CLASS, 'Entity\Post');

    }

    public function getPostByID(int $id)
    {
        $query = 'SELECT p.*, CONCAT(u.firstName," ",u.lastName) AS username FROM post p JOIN user u ON p.author = u.id WHERE p.id = :id';
        $response = $this->pdo->prepare($query);
        $response->bindValue(':id', $id, PDO::PARAM_INT);
        $response->setFetchMode(PDO::FETCH_CLASS, 'Entity\Post');
        $response->execute();
        return $response->fetch();
    }

    public function setMyPost($title, $content, $author, $img): bool
    {
        $insert = $this->pdo->prepare('INSERT INTO post(title, content, author, img, createdAt) VALUES(?, ?, ?, ?, ?)');
        $dateNow = date("Y-m-d");
        return $insert -> execute(array($title, $content, $author, $img, $dateNow));
    }

    public function postDelete($id): bool
    {
        $query = 'DELETE FROM post WHERE id = :id';
        $response = $this->pdo->prepare($query);
        $response->bindValue(':id', $id, PDO::PARAM_INT);
        return $response->execute();
    }

    public function postEdit($id, $title, $content, $img){
        $insert = $this->pdo->prepare('UPDATE post SET title = :title, content = :content, img = :img WHERE id = :id');
        return $insert -> execute(array(":title" => $title, ":content" => $content, ":img" => $img, ":id" => $id));
    }
}