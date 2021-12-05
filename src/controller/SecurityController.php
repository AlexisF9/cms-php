<?php

namespace App\Controller;

use App\Framework\PDOFactory;

use App\Manager\SecurityManager;

class SecurityController extends BaseController
{

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

    public function logout()
    {
        $manager = new SecurityManager(PDOFactory::getMySqlConnection());
        $manager->logOut();

        Header('Location: /');
        exit;
    }
    
    public function signUp()
    {
        $manager = new SecurityManager(PDOFactory::getMySqlConnection());
        return $this->render("Inscription", [], "Security/signUp");
    }

    public function inscription()
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