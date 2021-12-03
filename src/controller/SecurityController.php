<?php

class SecurityController
{

    

    function signIn()
    {
        $manager = new SecurityManager(PDOFactory::getMySqlConnection());
        var_dump($manager->connexion("alexis@gmail.com", "test"));
    }
    
    function signUp()
    {
        //todo
    }
}



?>