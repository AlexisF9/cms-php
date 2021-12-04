<?php

class CommentController extends BaseController
{
    public function setComment($postId) {
        $manager = new CommentManager(PDOFactory::getMySqlConnection());
        $data = $manager->setComment($_SESSION["user"]["id"] ,$_POST["content"], $postId);

        if(!$data) {
            Header('Location: /post/' . $postId);
            exit;
        } else {
            Header('Location: /post/' . $postId);
            exit;
        }
    }
}