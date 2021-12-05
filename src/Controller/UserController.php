<?php

namespace App\Controller;

use App\Framework\PDOFactory;

use App\Manager\UserManager;

class UserController extends BaseController
{
    public function userDelete(int $id) {
        $manager = new UserManager(PDOFactory::getMySqlConnection());
        $manager->userDelete($id);
        Header('Location: /userList');
        exit;
    }

    public function userShow(string $state){
        return $this->render("Admin",[$state],"Front/userShow");
    }

    public function userEdit(){
        $manager = new UserManager(PDOFactory::getMySqlConnection());

        if($_POST["passwd"] != $_POST["vPasswd"]){
            Header('Location: /admin/wrong');
            exit;
        }


        if($_POST["isAdmin"] == "on")
            $isAdmin = true;
        else
            $isAdmin = false;


        $bool = $manager->userEdit($_POST["firstName"], $_POST["lastName"], $_POST["email"], $isAdmin, $_POST["passwd"], $_SESSION["user"]["id"]);
        if($bool) {
            $_SESSION["user"]["firstName"] = $_POST["firstName"];
            $_SESSION["user"]["lastName"] = $_POST["lastName"];
            $_SESSION["user"]["email"] = $_POST["email"];
            $_SESSION["user"]["isAdmin"] = $isAdmin ? "1" : "0";
            // pas besoin de modif le passwd de la session on l'utilise pas

            Header('Location: /admin/updating');
            exit;
        }else{
            Header('Location: /admin');
            exit;
        }
    }
}