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
        
        // Accessible depuis /login
        // récupère les datas depuis $_POST["email"] et $_POST["password"]
        // vérifer les credentials en DB
        // redirection vers /admin
    }
    
    function signUp()
    {
        $managerInscription = new SecurityManager(PDOFactory::getMySqlConnection());
        //var_dump($managerInscription->inscription("guillaume@gmail.com", "Guillaume", "Meheut", "test"));
    }
}

?>