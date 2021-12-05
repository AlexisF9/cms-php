<?php

class CommentManager
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo=$pdo;
    }

    public function getCommentByPostID(int $postId)
    {
        $query = 'SELECT c.*, CONCAT(u.firstName," ",u.lastName) AS username FROM comment c JOIN user u ON c.author = u.id WHERE c.postId = :postId';
        $response = $this->pdo->prepare($query);
        $response->bindValue(':postId', $postId, PDO::PARAM_INT);
        $response->setFetchMode(PDO::FETCH_CLASS, 'Entity\Comment');
        $response->execute();
        return $response->fetchAll();
    }

    public function getCommentById(int $id){
        $query = 'SELECT c.*, CONCAT(u.firstName," ",u.lastName) AS username FROM comment c JOIN user u ON c.author = u.id WHERE c.id = :id';
        $response = $this->pdo->prepare($query);
        $response->bindValue(':id', $id, PDO::PARAM_INT);
        $response->setFetchMode(PDO::FETCH_CLASS, 'Entity\Comment');
        $response->execute();
        return $response->fetch();
    }

    public function setComment(int $userId, string $content, int $postId): bool
    {
        $insert = $this->pdo->prepare('INSERT INTO comment(author, content, postId, createdAt) VALUES(?, ?, ?, ?)');
        $dateNow = date("Y-m-d");
        return $insert -> execute(array($userId, $content, $postId, $dateNow));
    }

    public function commentDelete($id): bool
    {
        $query = 'DELETE FROM comment WHERE id = :id';
        $response = $this->pdo->prepare($query);
        $response->bindValue(':id', $id, PDO::PARAM_INT);
        return $response->execute();
    }

    public function commentEdit($id, $content){
        $insert = $this->pdo->prepare('UPDATE comment SET content = :content WHERE id = :id');
        return $insert -> execute(array(":content" => $content, ":id" => $id));
    }
}