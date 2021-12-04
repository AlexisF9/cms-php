<?php

class UserManager
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo=$pdo;
    }

    /**
     * @return User[]
     */
    public function getAllUser()//:array
    {
        $query = 'SELECT * FROM user';
        $response = $this->pdo->query($query);
        return $response->fetchAll(PDO::FETCH_CLASS, 'Entity\User');
    }

    public function userDelete(int $id){
        $query = 'DELETE FROM user WHERE id = :id';
        $response = $this->pdo->prepare($query);
        $response->bindValue(':id', $id, PDO::PARAM_INT);
        $response->execute();
    }

    public function userEdit(string $firstName, string $lastName, string $email, bool $isAdmin, string $passwd, int $id){
        if(preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $email)) {
            if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $password = password_hash($passwd, PASSWORD_DEFAULT);
                $insert = $this->pdo->prepare('UPDATE user SET firstName = :f, lastName = :l, email = :e , isAdmin = :i, password = :p WHERE id = :id'); // prepare pour y inserer dans la base ":" preparation du tableau associatif
                $bool = $insert -> execute(array(":f" => $firstName, ":l" => $lastName, ":e" => $email, ":i" => $isAdmin, ":p" => $password, ":id" => $id));
                return $bool;
            }
        }
    }
}