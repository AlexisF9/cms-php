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
}