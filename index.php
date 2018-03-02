<?php
//call the frontend controller.php file
require_once(__DIR__ . "/controller/frontend/controller.php");

//create an object from the class "Controller"
$controller = new Controller();

//test if $_GET['action'] exists..then we use a switch to test it's value
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
            //if none of the cases exists we show the error page
            require('view/frontend/error.php');
            
            break;
    }

}
//if $_GET['action'] dont exists we list all articles
else {
    
    $controller->listChapters();
}