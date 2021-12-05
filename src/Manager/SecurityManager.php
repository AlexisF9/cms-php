<?php

namespace App\Manager;

use PDO;

class SecurityManager
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo=$pdo;
    }

    /**
     * @return Security
     */
    public function signIn($email, $password)
    {
        $sql = $this->pdo->prepare("SELECT * FROM user WHERE email = ?");
        $sql->execute(array($email));
        $data = $sql->fetch(\PDO::FETCH_ASSOC);

        if(password_verify($password, $data["password"])) {
            $_SESSION["user"] = $data;
            return true;
        }
        return false;
    }

    public function logOut()
    {
        session_destroy();
    }

    public function signUp($email, $firstName, $lastName, $password)
    {
        
        $check = $this->pdo->prepare('SELECT firstName, lastName, email, password FROM user WHERE email = ?');
        $check->execute(array($email));
        $data = $check->fetch(); 
        $row = $check->rowCount();

        if($row == 0) {
            if(preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $email)) {
                if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $password = password_hash($password, PASSWORD_DEFAULT);
                    $insert = $this->pdo->prepare('INSERT INTO user(email, firstName, lastName, password) VALUES(?, ?, ?, ?)'); // prepare pour y inserer dans la base ":" preparation du tableau associatif
                    $insert -> execute(array($email, $firstName, $lastName, $password));
                    return true;
                }
            }
        } else {
            return false;
        }
    }
}