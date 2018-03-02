<?php

require('model/model.php');

function listChapters()
{
    $model = new Model();
    $req = $model->getChapters();

    require('view/indexView.php');
}

function listPosts()
{
    $model = new Model();
    $chapter = $model->getChapter($_GET['id']);
    $comments = $model->getComments($_GET['id']);

    require('view/commentsView.php');
}

function addComment($chapterId, $author, $comment)
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