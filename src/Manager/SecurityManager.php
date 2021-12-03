<?php

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
    public function connexion($email, $password)
    {
        $sql = $this->pdo->prepare("SELECT * FROM user WHERE email = ?");
        $sql->execute(array($email));
        $data = $sql->fetch(PDO::FETCH_OBJ);
        var_dump($data);die();

        if($password = $data['password']) {
            return $data;
        }
        return false;
    }
}