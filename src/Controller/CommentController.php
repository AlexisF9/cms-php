<?php

namespace App\Controller;

use App\Framework\PDOFactory;

use App\Manager\CommentManager;

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

    public function commentDelete($param){
        $param = explode('-',$param);
        $id = $param[0];
        $postId = $param[1];

        $manager = new CommentManager(PDOFactory::getMySqlConnection());
        $data = $manager->commentDelete($id);

        if($data) {
            Header('Location: /post/' . $postId);
            exit;
        } else {
            Header('Location: /post/' . $postId);
            exit;
        }
    }

    public function commentEdit($param){
        $param = explode('-',$param);
        $id = $param[0];
        $postId = $param[1];

        $manager = new CommentManager(PDOFactory::getMySqlConnection());
        return $this->render("Post Edit",[$manager->getCommentById($id),$postId],"Front/commentEdit");
    }

    public function editComment($param){
        $param = explode('-',$param);
        $id = $param[0];
        $postId = $param[1];

        $manager = new CommentManager(PDOFactory::getMySqlConnection());
        $data = $manager->commentEdit($id, $_POST["content"]);

        if($data) {
            Header('Location: /post/'.$postId);
            exit;
        } else {
            Header('Location: /commentEdit/'.$id."-".$postId);
            exit;
        }
    }
}