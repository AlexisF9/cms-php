<?php

class SecurityController
{

    

    function signIn()
    {
        $manager = new SecurityManager(PDOFactory::getMySqlConnection());
        //var_dump($manager->connexion("guillaume@gmail.com", "test"));
    }
    
    function signUp()
    {
        $managerInscription = new SecurityManager(PDOFactory::getMySqlConnection());
        //var_dump($managerInscription->inscription("guillaume@gmail.com", "Guillaume", "Meheut", "test"));
    }
}



?>