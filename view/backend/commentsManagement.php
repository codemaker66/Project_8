<?php $title = 'Commentaires';

//call the backend model file: UserModel.php and create an object from the class USER
require_once(__DIR__ ."/../../model/backend/UserModel.php");

$session = new USER();

if(!$session->is_loggedin())
{
  //if the session is not set then we redirect to the index page
  $session->redirect('index.php');
}
?>

<?php ob_start(); ?>



  <!-- Main Content -->
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-10 mx-auto">
          <?php 
            //show message after approving / deleting a comment
            if(isset($_GET['status'])){ 
              echo '<h3>Commentaire '.$_GET['status'].'.</h3>'; 
            } 
          ?>

          <?php
            if ($result->rowCount() == 0) {?>
              <p style="text-align: center;">Il n'y a pas de commentaires à modérer pour le moment</p>
            <?php
            }
            else
            { ?>

               <div class="table-responsive">
               <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">ID de l'article</th>
                <th scope="col">Auteur</th>
                <th scope="col">Commentaire</th>
                <th scope="col">Date de création</th>
                <th scope="col">Nombre de signalement</th>
                <th scope="col">Approuver</th>
                <th scope="col">Supprimer</th>
              </tr>
            </thead>
            <tbody>
              <?php
        while ($data = $result->fetch(PDO::FETCH_ASSOC))
        {
        ?>
        <tr>
          <th scope="row"><?= $data['chapter_id']; ?></th>
          <td><?= htmlspecialchars($data['author']); ?></td>
          <td><?= htmlspecialchars($data['comment']); ?></td>
          <td><?= $data['comment_date_fr']; ?></td>
          <td><?= $data['report_nb']; ?></td>
          <td>
            <button type="button" class="btn btn-success" onclick="approveComment('<?= $data['author']; ?>', '<?= $data['id'];?>');">Approuver</button>
          </td>
          <td>
            <button type="button" class="btn btn-danger" onclick="delcomment('<?= $data['author']; ?>', '<?= $data['id'];?>');">Supprimer</button>
          </td>
        </tr>
              <?php
              } 
              $result->closeCursor();
              ?>   
            </tbody>
          </table>
          </div>
          <?php
          echo '<p style="text-align: center;">Page : ';
          for($i=1; $i<=$numberOfPages; $i++)
          {
               
               if($i==$currentPage)
               {
                   echo ' [ '.$i.' ] '; 
               }  
               else 
               {
                    echo ' <a href="admin.php?action=comments&amp;page='.$i.'">'.$i.'</a> ';
               }
          }
          echo '</p>';
          }
          ?> 
        </div>
      </div>
    </div>
<hr>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>