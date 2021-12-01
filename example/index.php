<?php
require "model.php";
session_start();
//var_dump(password_verify('azertya', '$2y$10$X4YyX0aY0xNqc/0XzWtUhucL6Vup8MQGlNi8.uUWY8F1zTkND3Xq.'));

/* Le controleur (index.php) est là pour faire le lien (les liens, et les bons) entre 
   les données issues du modèle (le fond) et la vue (l'interface) qui définit leur présentation (la forme).
*/
$dbi = new DBInterface();


if(isset($_REQUEST['login']) && isset($_REQUEST['pwd'])) {
    $_SESSION['user'] = $dbi->checkAuthentification($_REQUEST['login'], $_REQUEST['pwd']);
}

if ( isset($_REQUEST['logout']) && $_REQUEST['logout'] ) {
    $username = $_SESSION['user']->getName();
    $_SESSION['user'] = false;
    die("Bye Bye " . $username);
}

if(!isset($_SESSION['user']) || !$_SESSION['user']) {
    header('Location: blog-login.html');
    exit;
}

// Contrôle de la suppression d'un message
if ( isset($_REQUEST['delete']) ){
    $dbi->deleteTweet($_REQUEST['delete']);
}

// Contrôle du formulaire d'ajout d'un nouveau message
if ( isset( $_REQUEST['message']) && !empty( $_REQUEST['message'] ) ){
   // image ou pas image ?
   $image_path = "";
   if ($_FILES['picture']['error'] == UPLOAD_ERR_OK ){
      $tmp_location = $_FILES['picture']['tmp_name'];
      $image_path = "./pictures/" . $_FILES['picture']['name'];
      move_uploaded_file($tmp_location, $image_path);
   }
    $dbi->saveTweet( $_SESSION['user'], $_REQUEST['message'], $image_path );
}

/* Récupérations de tous les messages sous la forme d'un tableau associatif */
$tweets = $dbi->getAllTweets();

/* préparation de la liste des messages formatés. Un template de message est chargé sous forme de chaîne
   que l'on formate avec les bonnes données grâce à str_replace. */
$formatedTweets = "";
$tpl_without_picture = file_get_contents("tweet-template.inc");
$tpl_with_picture = file_get_contents("tweet-template-with-picture.inc");
$tpl_without_picture_read_only = file_get_contents("tweet-template-read-only.inc");
$tpl_with_picture_read_only = file_get_contents("tweet-template-with-picture-read-only.inc");
$search  = array("{{id}}", "{{pseudo}}", "{{date}}", "{{message}}", "{{image}}"); // sous-chaine à remplacer
foreach( $tweets as $t) {
    $replace = array(
        $t->getId(),
        $t->getAuthor(),
        $t->getDate(),
        $t->getMessage(),
        $t->getImage());  // ce par quoi les remplacer (correspondance 2 à 2)
    // sélection du bon template selon la présence ou non d'une image
    if ($_SESSION['user']->getId() == $t->getAuthorId()) {
        if ($t->getImage() == "")
            $tpl = $tpl_without_picture;
        else
            $tpl = $tpl_with_picture;
   }
    else {
        if ($t->getImage() == "")
            $tpl = $tpl_without_picture_read_only;
        else
            $tpl = $tpl_with_picture_read_only;
    }
   
   // shorthand pour le if/else précédent : 
   // $tpl = $t["image"]=="" ? $tpl_without_picture : $tpl_with_picture;
  
   $formatedTweets = $formatedTweets . str_replace( $search, $replace, $tpl);
 } 


/* Les données issues du model ont été récupérées ($tweets) et formatées ($formatedTweets)
 * La vue, qui a besoin de ces données, peut donc être affichée
 */
require "view.php";
