<?php

class FrontController extends BaseController
{

    public function home(int $number = 5) {
        $manager = new PostManager(PDOFactory::getMySqlConnection());
        $arrayAllPost = $manager->getAllPosts();
        return $this->render("Accueil",$arrayAllPost,"Front/home");
        
    }

    public function show($id) 
    {
        $managerPost = new PostManager(PDOFactory::getMySqlConnection());
        $managerComment = new CommentManager(PDOFactory::getMySqlConnection());
        $array = [$managerPost->getPostbyId($id),$managerComment->getCommentByPostID($id)];
        return $this->render("Article",$array,"Front/show");
    }

    public function userList() {
        $manager = new UserManager(PDOFactory::getMySqlConnection());
        $arrayAllUser = $manager->getAllUser();
        return $this->render("User List",$arrayAllUser,"Front/userList");
    }


}