<?php

require('model/model.php');

function listChapters()
{
    $req = getChapters();

    require('view/indexView.php');
}

function listPosts()
{
    $chapter = getChapter($_GET['id']);
    $comments = getComments($_GET['id']);

    require('view/commentsView.php');
}

function addComment($chapterId, $author, $comment)
{
    $affectedLines = postComment($chapterId, $author, $comment);

    if ($affectedLines === false) {
        die('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=listPosts&id=' . $chapterId);
    }
}