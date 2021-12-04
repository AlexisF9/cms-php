<?php


class UserController extends BaseController
{
    public function userDelete($id) {
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

        $data = $manager->userEdit($_POST["firstName"], $_POST["lastName"], $_POST["email"], $_POST["isAdmin"] == "on" ? "1" : "0", $_POST["passwd"], $_SESSION["user"]["id"]);

        if($data == true) {
            $_SESSION["user"]["firstName"] = $_POST["firstName"];
            $_SESSION["user"]["lastName"] = $_POST["lastName"];
            $_SESSION["user"]["email"] = $_POST["email"];
            $_SESSION["user"]["isAdmin"] = $_POST["isAdmin"] == "on" ? "1" : "0";
            // pas besoin de modif le passwd de la session on l'utilise pas

            Header('Location: /admin');
            exit;
        }
    }
}