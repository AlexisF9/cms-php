<?php
require('db.php');

class User extends DBInterface {
    private $id;
    private $firstName;
    private $lastName;

    private $email;
    private $password;

    private $isAdmin;

    public function __construct($id, $firstName,$lastName,$email,$password)
    {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->$lastName = $lastName;
        $this->$email = $email;
        $this->$password = $password;
        $this->$isAdmin = $isAdmin;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getFirstName()
    {
        return $this->$firstName;
    }
    public function getLastName()
    {
        return $this->$lastName;
    }
    public function getEmail()
    {
        return $this->$email;
    }
    public function getPassword()
    {
        return $this->$password;
    }

    public function setId($newId)
    {
        $this->id = $newId;
    }

    public function setFirstName($newFirstName)
    {
        $this->$firstName = $newFirstName;
    }
    public function setLastName($newLastName)
    {
        $this->$lastName = $newLastName;
    }
    public function setEmail($newEmail)
    {
        $this->$email = $newEmail;
    }
    public function setpassword($newPassword)
    {
        $this->$password = $newPassword;
    }
}

?>