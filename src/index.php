<pre>
<?php

// faire un autoload avec composer
require './controller/FrontController.php';
require './Entity/Post.php';
require './Framework/PDOFactory.php';
require './Manager/PostManager.php';

isset($_GET['p']) ? $path = $_GET['p'] : $path = null;

switch ($path) {
    case null:
        // Faire un routeur
        $controller = new FrontController();
        $controller->home();
        break;
        
    case 'show':
        $controller = new FrontController();
        $controller->show();
        break;

}

?>