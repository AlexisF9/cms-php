<?php

session_start();

// faire un autoload avec composer
require "vendor/autoload.php";
require "./Framework/PDOFactory.php";

use App\Controller\FrontController;
use App\Controller\CommentController;
use App\Controller\PostController;
use App\Controller\SecurityController;
use App\Controller\UserController;


isset($_GET['p']) ? $path = $_GET['p'] : $path = null;

$link = explode('/',$_GET['p']);
$path = $link[0];
$param = $link[1];

switch ($path) {
    case null:
        // Faire un routeur
        $Controller = new FrontController();
        $Controller->home();
        break;
        
    case 'post':
        $Controller = new FrontController();
        $Controller->show($param);
        break;

    case 'postDelete':
        $Controller = new PostController();
        $Controller->postDelete($param);
        break;

    case 'postEdit':
        $Controller = new PostController();
        $Controller->postEdit($param);
        break;

    case 'editPost':
        $Controller = new PostController();
        $Controller->editPost($param);
        break;
    
    case 'signin':
        $ControllerSecurity = new SecurityController();
        $ControllerSecurity->signIn();
        break;

    case 'login':
        $ControllerSecurity = new SecurityController();
        $ControllerSecurity->login();
        break;

    case 'logout':
        $ControllerSecurity = new SecurityController();
        $ControllerSecurity->logout();
        break;

    case 'signup':
        $ControllerSecurity = new SecurityController();
        $ControllerSecurity->signUp();
        break;

    case 'inscription':
        $ControllerSecurity = new SecurityController();
        $ControllerSecurity->inscription();
        break;

    case 'userList':
        $Controller = new FrontController();
        $Controller->userList();
        break;

    case 'userDelete':
        $Controller = new UserController();
        $Controller->userDelete($param);
        break;

    case 'admin':
        $Controller = new UserController();
        if($param == null)
            $Controller->userShow("ok");
        else
            $Controller->userShow($param);

        break;

    case 'userEdit':
        $Controller = new UserController();
        $Controller->userEdit();
        break;

    case 'mypost':
        $Controller = new PostController();
        $Controller->setPost();
        break;

    case 'myComment':
        $Controller = new CommentController();
        $Controller->setComment($param);
        break;

    case 'commentDelete':
        $Controller = new CommentController();
        $Controller->commentDelete($param);
        break;

    case 'commentEdit':
        $Controller = new CommentController();
        $Controller->commentEdit($param);
        break;

    case 'editComment':
        $Controller = new CommentController();
        $Controller->editComment($param);
        break;
}

?>