<?php
require(__DIR__ . "/controller/frontend/controller.php");

$controller = new Controller();

if (isset($_GET['action'])) {
    
    switch ($_GET['action']) {
        
        case 'listPosts':
            
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                
                $controller->listPosts();
            }
            else {
                require('view/frontend/error.php');
            }
            
            break;

        case 'addComment':
            
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                
                    $controller->addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                }
                else {
                    require('view/frontend/error.php');
                }
            }
            else {
                require('view/frontend/error.php');
            }

            break;

        case 'report':
            
            if (isset($_GET['id']) && $_GET['id'] > 0) {
            
                $controller->report($_GET['id'], $_GET['chapter_id']);
            }

            else{
                    require('view/frontend/error.php');
            }

            break;

        default:

            require('view/frontend/error.php');
            
            break;
    }

}
else {
    
    $controller->listChapters();
}