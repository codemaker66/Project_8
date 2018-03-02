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