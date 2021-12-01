<?php

session_start();
session_destroy();

require_once '../model/bdd.php';

if(isset($_POST['firstName'], $_POST['lastName'], $_POST['email'], $_POST['password'], $_POST['password_retype'])) { // verifie que les champs exsistes
    
    
    $firstName = htmlspecialchars($_POST['firstName']); // htmlspecialchars pour la sécurité
    $lastName = htmlspecialchars($_POST['lastName']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $password_retype = htmlspecialchars($_POST['password_retype']);

    $check = $bdd->prepare('SELECT firstName, lastName, email, password FROM user WHERE email = ?'); //verif qu'il est bien inscrit dans la table
        $check -> execute(array($email));
        $data = $check->fetch(); //on stock les données dans data et on cherches les données avec fetch
        $row = $check->rowCount(); //verif si il existe avec rowCount (=1 exsiste sinon exsiste pas)

    if($row == 0) { // si la personne n'est pas dans la base de données alors...

        if(strlen($firstName) <= 255) {//strlen pour recup la valeur de la chaine de caractères (ici, si le pseudo fait moins de 255 caractères alors...)

            if(strlen($lastName) <= 255) {

                if(preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['email'])) {

                    if(filter_var($email, FILTER_VALIDATE_EMAIL)) { // verif si l'email n'existe pas dans la base

                        if($password == $password_retype) {
                            
                            $password = password_hash($password, PASSWORD_DEFAULT);

                            $insert = $bdd->prepare('INSERT INTO user(email, firstName, lastName, password) VALUES(?, ?, ?, ?)'); // prepare pour y inserer dans la base ":" preparation du tableau associatif
                            $insert -> execute(array($email, $firstName, $lastName, $password));

                            ?>

                            <h1>Votre compte à été créé avec succès</h1>

                            <?php

                        }else {
                            Header ('location:../view/inscription.php?reg_err=password');
                        }
                    }else {
                        Header ('location:../view/inscription.php?reg_err=email');
                    }
                }else {
                    Header ('location:../view/inscription.php?reg_err=email_length');
                }
            }else {
                Header ('location:../view/inscription.php?reg_err=lastname_length');
            }
        }else {
            Header ('location:../view/inscription.php?reg_err=firstname_length');
        }
    }else {
        Header ('location:../view/inscription.php?reg_err=already');
    }
} else {
    Header ('location:../view/inscription.php');
}