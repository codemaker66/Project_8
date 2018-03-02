<?php
require_once(__DIR__ . "/controller/frontend/controller.php");

if (isset($_GET['action'])) {
    
    if ($_GET['action'] == 'listPosts') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $controller = new Controller();
            $controller->listPosts();
        }
        else {
            echo 'Erreur : aucun identifiant de billet envoyé';
        }
    }
    elseif ($_GET['action'] == 'addComment') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                $controller = new Controller();
                $controller->addComment($_GET['id'], $_POST['author'], $_POST['comment']);
            }
            else {
                echo 'Erreur : tous les champs ne sont pas remplis !';
            }
        }
        else {
            echo 'Erreur : aucun identifiant de billet envoyé';
        }
    }
    else{

        echo "erreur 404";
    }   



}

else {
    
    $controller = new Controller();
    $controller->listChapters();
}