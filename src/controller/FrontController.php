<?php

class FrontController
{
    public function home() {
        $manager = new PostManager(PDOFactory::getMySqlConnection());
        var_dump($manager->getAllPosts());
    }

    public function show() 
    {
        $manager = new PostManager(PDOFactory::getMySqlConnection());
        var_dump($manager->getPostbyId($_GET['id']));
    }
}