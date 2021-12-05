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

    public function postDelete($id){
        $manager = new PostManager(PDOFactory::getMySqlConnection());
        $data = $manager->postDelete($id);

        if($data) {
            Header('Location: /');
            exit;
        } else {
            Header('Location: /');
            exit;
        }
    }

    public function postEdit($id){
        $manager = new PostManager(PDOFactory::getMySqlConnection());
        return $this->render("Post Edit",[$manager->getPostbyId($id)],"Front/postEdit");
    }

    public function editPost($id){
        $manager = new PostManager(PDOFactory::getMySqlConnection());
        $data = $manager->postEdit($id,$_POST["title"], $_POST["content"], $_POST["img"]);

        if($data) {
            Header('Location: /post/'.$id);
            exit;
        } else {
            Header('Location: /postEdit/'.$id);
            exit;
        }
    }
}