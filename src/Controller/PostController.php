<?php

class PostController extends BaseController
{
    public function setPost() {
        $manager = new PostManager(PDOFactory::getMySqlConnection());
        $data = $manager->setMyPost($_POST["title"], $_POST["content"], $_POST["author"], $_POST["img"]);
        
        if(!$data) {
            Header('Location: /');
            exit;
        } else {
            Header('Location: /');
            exit; 
        }
    }
}