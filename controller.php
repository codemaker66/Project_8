<?php

require('model.php');

function listArticles()
{
    $req = getArticles();

    require('show.php');
}

function articleWcomments()
{
    $article = getArticle($_GET['id']);
    $comments = getComments($_GET['id']);

    require('comments.php');
}