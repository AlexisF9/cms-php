<?php

namespace Entity;

class Comment 
{
    private $id;
    private $post_id;
    private $author;
    private $createdAt;
    private $content;

    public function getId() {
        return $this->$id;
    }
    public function getPostId() {
        return $this->$post_id;
    }
    public function getAuthor()
    {
        return $this->$author;
    }
    public function getCreatedAt()
    {
        return $this->$createdAt;
    }
    public function getContent()
    {
        return $this->$content;
    }


    public function setAuthor($newAuthor)
    {
        $this->$author = $author;
    }
    public function setContent($newContent)
    {
        $this->$content = $newContent;
    }
    
}