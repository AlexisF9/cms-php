<?php

class SecurityController
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

    public function signIn()
    {
        $manager = new SecurityManager(PDOFactory::getMySqlConnection());
        return $this->render("Connexion", [],"Security/signIn");
    }

    public function login() {
        $manager = new SecurityManager(PDOFactory::getMySqlConnection());
        $data = $manager->signIn($_POST["email"], $_POST["password"]);
        
        if(!$data) {
            Header('Location: /signin');
            exit;
        } else {
            Header('Location: /');
            exit; 
        }
    }
    
    function signUp()
    {
        $manager = new SecurityManager(PDOFactory::getMySqlConnection());
        return $this->render("Inscription", [], "Security/signUp");
    }

    function inscription()
    {
        $manager = new SecurityManager(PDOFactory::getMySqlConnection());
        $data = $manager->signUp($_POST["email"], $_POST["firstName"], $_POST["lastName"], $_POST["password"]);
        
        if(!$data) {
            Header('Location: /signup');
            exit;
        } else {
            Header('Location: /signin');
            exit; 
        }

        //var_dump($managerInscription->inscription("guillaume@gmail.com", "Guillaume", "Meheut", "test"));
    }
}

?>