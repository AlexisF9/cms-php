<?php

session_start();

// faire un autoload avec composer
require './controller/FrontController.php';
require './Entity/Post.php';
require './Entity/Comment.php';
require './Framework/PDOFactory.php';
require './Manager/PostManager.php';
require './Manager/CommentManager.php';

require './Entity/User.php';
require './Manager/SecurityManager.php';
require './controller/SecurityController.php';

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
    
    case 'signin':
        $ControllerSecurity = new SecurityController();
        $ControllerSecurity->signIn();
        break;

    case 'login':
        $ControllerSecurity = new SecurityController();
        $ControllerSecurity->login();
        break;
        
}

?>