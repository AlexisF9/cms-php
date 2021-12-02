<?php

class FrontController
{
    public function home(int $number = 5) {
        $manager = new PostManager(PDOFactory::getMySqlConnection());
        var_dump($manager->getAllPosts());

        /*$index = $manager->getAllPosts($number);

        return $this->render('Page d\'accueil', $index, 'Frontent\index');*/
    }

    public function show() 
    {
        $manager = new PostManager(PDOFactory::getMySqlConnection());
        var_dump($manager->getPostbyId($_GET['id']));
    }

    public function showComment() {
        $manager = new CommentManager(PDOFactory::getMySqlConnection());
        var_dump($manager->getCommentByID($_GET['postId']));
    }
}