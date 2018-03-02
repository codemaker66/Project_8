<?php

require_once("model/model.php");


class Controller extends Model {
    
    public function listChapters()
    {
        $model = new Model();
        $req = $model->getChapters();

        require('view/indexView.php');
    }

    public function listPosts()
    {
        $model = new Model();
        $chapter = $model->getChapter($_GET['id']);
        $comments = $model->getComments($_GET['id']);

        require('view/commentsView.php');
    }

    public function addComment($chapterId, $author, $comment)
    {
        $model = new Model();
        $affectedLines = $model->postComment($chapterId, $author, $comment);

        if ($affectedLines === false) {
            die('Impossible d\'ajouter le commentaire !');
        }
        else {
            header('Location: index.php?action=listPosts&id=' . $chapterId);
        }
    }
    
}
