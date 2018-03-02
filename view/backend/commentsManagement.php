<?php $title = 'AdminPanel';

  require_once(__DIR__ ."/../../model/backend/UserModel.php");
  $session = new USER();
  if(!$session->is_loggedin())
  {
    // session no set redirects to login page
    $session->redirect('index.php');
  }
?>

<?php ob_start(); ?>



  <!-- Main Content -->
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-10 mx-auto">
          <?php 
  //show message from add / edit page
  if(isset($_GET['status'])){ 
    echo '<h3>Comment '.$_GET['status'].'.</h3>'; 
  } 
  ?>

<?php
if ($result->rowCount() == 0) {?>
  <p style="text-align: center;">there are no comments to moderate at the moment</p>
<?php
}
else
{ ?>


     <div class="table-responsive">
     <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">chapter_id</th>
      <th scope="col">author</th>
      <th scope="col">comment</th>
      <th scope="col">creation_date</th>
      <th scope="col">report_number</th>
      <th scope="col">approve</th>
      <th scope="col">delete</th>
    </tr>
  </thead>
  <tbody>
      <?php
while ($data = $result->fetch())
{
?>
<tr>
      <th scope="row"><?= $data['chapter_id']; ?></th>
      <td><?= htmlspecialchars($data['author']); ?></td>
      <td><?= htmlspecialchars($data['comment']); ?></td>
      <td><?= $data['comment_date_fr']; ?></td>
      <td><?= $data['report_nb']; ?></td>
      <td><a class="btn btn-success" href="#" onclick="approveComment('<?= $data['author']; ?>', '<?= $data['id'];?>');return false;">Approve</a></td>
      <td><a class="btn btn-danger" href="#" onclick="delcomment('<?= $data['author']; ?>', '<?= $data['id'];?>');return false;">delete</a></td>

    </tr>
      <?php
} 
$result->closeCursor();
?>   
  </tbody>
</table>
</div>
<?php
echo '<p align="center">Page : '; //Pour l'affichage, on centre la liste des pages
for($i=1; $i<=$numberOfPages; $i++) //On fait notre boucle
{
     //On va faire notre condition
     if($i==$currentPage) //Si il s'agit de la page actuelle...
     {
         echo ' [ '.$i.' ] '; 
     }  
     else //Sinon...
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