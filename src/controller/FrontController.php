<?php

class FrontController
{

    private $viewDir;
    private $template;

    public function __construct(){
        $this->viewDir = "View/";
        $this->template  = "View/template.view.php";
    }

    public function render(string $title, array $data, string $view){
        $view = $this->viewDir . $view . ".view.php";
        ob_start();
        require $view;
        $content = ob_get_clean();
        return require $this->template;
    }

    public function home(int $number = 5) {
        $manager = new PostManager(PDOFactory::getMySqlConnection());
        
        var_dump($manager->getAllPosts());
    }

    public function show($id) 
    {
        $managerPost = new PostManager(PDOFactory::getMySqlConnection());
        $managerComment = new CommentManager(PDOFactory::getMySqlConnection());
        $array = [$managerPost->getPostbyId($id),$managerComment->getCommentByPostID($id)];
        // var_dump($array);

        return $this->render("Article",$array,"Front/show");

    }
}