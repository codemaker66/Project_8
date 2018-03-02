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
    echo '<h3>Post '.$_GET['status'].'.</h3>'; 
  } 
  ?>
     
     <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">title</th>
      <th scope="col">creation_date</th>
      <th scope="col">edit</th>
      <th scope="col">delete</th>
    </tr>
  </thead>
  <tbody>
      <?php
while ($data = $req->fetch())
{
?>
<tr>
      <th scope="row"><?= $data['id']; ?></th>
      <td><?= $data['title']; ?></td>
      <td><?= $data['creation_date_fr']; ?></td>
      <td><a href="javascript:delpost('<?php echo $data['id'];?>')">Delete</a></td>
      <td><a href="admin.php?action=update&amp;id=<?php echo $data['id'];?>">Edit</a></td>
    </tr>
      <?php
} 
$req->closeCursor();
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
          echo ' <a href="admin.php?action=admin&amp;page='.$i.'">'.$i.'</a> ';
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