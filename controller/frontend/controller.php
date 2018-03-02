<?php

require_once(__DIR__ . "/../../model/frontend/model.php");


class Controller extends Model {
    
    public function listChapters()
    {

        $messagesParPage=5; //Nous allons afficher 5 messages par page.
 
        $all = new Model();
        $total = $all->getAll();

                //Nous allons maintenant compter le nombre de pages.
        $nombreDePages=ceil($total/$messagesParPage);

         
        if(isset($_GET['page'])) // Si la variable $_GET['page'] existe...
        {
             $pageActuelle=intval($_GET['page']);
         
             if($pageActuelle == 0) 
             {
                  
                  header("Location: error.php");
                  exit();
             }
             elseif ($pageActuelle>$nombreDePages) { // Si la valeur de $pageActuelle (le numéro de la page) est plus grande que $nombreDePages...
               $pageActuelle=$nombreDePages;
             }
        }
        else // Sinon
        {
             $pageActuelle=1; // La page actuelle est la n°1    
        }

   
        $premiereEntree=($pageActuelle-1)*$messagesParPage; // On calcul la première entrée à lire



        $model = new Model();
        $req = $model->getChapters($premiereEntree, $messagesParPage);

        require('view/frontend/indexView.php');
    }

    public function listPosts()
    {
        $model = new Model();
        $req = $model->getChapter($_GET['id']);
        $comments = $model->getComments($_GET['id']);

        if ($req->rowCount() != 0)
          {
            $chapter = $req->fetch();
             require('view/frontend/commentsView.php');
          }

          else
          {
            require('view/frontend/error.php');
          }

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
