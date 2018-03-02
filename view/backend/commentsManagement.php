<?php $title = 'AdminPanel';

  require_once(__DIR__ ."/../../controller/backend/controller.php");
  $session = new USER();
  if(!$session->is_loggedin())
  {
    // session no set redirects to login page
    $session->redirect('../../index.php');
  }
?>

<?php ob_start(); ?>

<!-- Page Header -->
    <header class="masthead" style="background-image: url('public/img/home-bg.jpg')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading">
              <h1>Clean Blog</h1>
              <span class="subheading">A Blog Theme by Start Bootstrap</span>
            </div>
          </div>
        </div>
      </div>
    </header>

  <!-- Main Content -->
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <?php 
  //show message from add / edit page
  if(isset($_GET['status'])){ 
    echo '<h3>Comment '.$_GET['status'].'.</h3>'; 
  } 
  ?>
     
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
      <td><?= $data['author']; ?></td>
      <td><?= $data['comment']; ?></td>
      <td><?= $data['comment_date_fr']; ?></td>
      <td><?= $data['report_nb']; ?></td>
      <td><a href="admin.php?action=approve&amp;id=<?= $data['id'];?>">Approve</a></td>
      <td><a href="admin.php?action=deleteC&amp;id=<?= $data['id'];?>">delete</a></td>
    </tr>
      <?php
} 
$result->closeCursor();
?>   
  </tbody>
</table>
<?php
echo '<p align="center">Page : '; //Pour l'affichage, on centre la liste des pages
for($i=1; $i<=$nombreDePages; $i++) //On fait notre boucle
{
     //On va faire notre condition
     if($i==$pageActuelle) //Si il s'agit de la page actuelle...
     {
         echo ' [ '.$i.' ] '; 
     }  
     else //Sinon...
     {
          echo ' <a href="admin.php?action=comments&amp;page='.$i.'">'.$i.'</a> ';
     }
}
echo '</p>';
?>



       
        </div>
      </div>
    </div>
    <hr>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>