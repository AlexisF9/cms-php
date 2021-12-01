<?php

class Tweet {
     private $id;
     private $date;
     private $message;
     private $author;
     private $image;
     private $authorId;

    /**
     * Tweet constructor.
     * @param $lid
     * @param $ldate
     * @param $lmessage
     * @param $lauthor
     * @param $limage
     */
    public function __construct($lid, $ldate, $lmessage, $lauthor, $limage, $lauthorId)
    {
        $this->id = $lid;
        $this->date = $ldate;
        $this->message = $lmessage;
        $this->author = $lauthor;
        $this->image = $limage;
        $this->authorId = $lauthorId;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @return mixed
     */
    public function getAuthorId()
    {
        return $this->authorId;
    }
}


