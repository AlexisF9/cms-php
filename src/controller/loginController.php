<?php

class LoginController
{
    function signIn($email, $password)
    {
        
        $sql = "SELECT * FROM user WHERE email = '$email'";
        $res = $this->db->query($sql);
        $user = $res->fetch(PDO::FETCH_ASSOC);
        if(password_verify($password, $user['password'])) {
            return new User($user['id'], $user['name']);
        }
        return false;
    }
    
    function signUp()
    {
        //todo
    }
}



?>