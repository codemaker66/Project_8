<?php
require('controller.php');

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'listArticles') {
        listArticles();
    }
    elseif ($_GET['action'] == 'articleWcomments') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            articleWcomments();
        }
        else {
            echo 'Erreur : aucun identifiant de billet envoyé';
        }
    }
}
else {
    listArticles();
}