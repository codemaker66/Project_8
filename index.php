<?php
require('controller/controller.php');

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'listChapters') {
        listChapters();
    }
    elseif ($_GET['action'] == 'listPosts') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            listPosts();
        }
        else {
            echo 'Erreur : aucun identifiant de billet envoyé';
        }
    }
}
else {
    listChapters();
}