<?php

namespace Entity;

class Post 
{
    private $id;
    private $img;
    private $createdAt;
    private $content;
    private $author;
    private $titre;

    public function getId() {
        return $this->$id;
    }
    public function getImg()
    {
        return $this->$img;
    }
    public function getCreatedAt()
    {
        return $this->$createdAt;
    }
    public function getContent()
    {
        return $this->$content;
    }
    public function getAuthor()
    {
        return $this->$author;
    }
    public function getTitre()
    {
        return $this->$titre;
    }


    public function setImg($newImg)
    {
        $this->$img = $newImg;
    }
    public function setContent($newContent)
    {
        $this->$content = $newContent;
    }
    public function setAuthor($newAuthor)
    {
        $this->$author = $author;
    }
    public function setTitre($newTitre)
    {
        $this->$titre = $newTitre;
    }
    
}