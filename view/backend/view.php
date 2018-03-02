<?php $title = 'AdminPanel';

?>

<?php ob_start(); ?>

  <!-- Main Content -->
    <div class="container">
      <div class="row">
        <div class="col-lg-10 col-md-10 mx-auto">

          <?php 
  //show message from add / edit page
  if(isset($_GET['status'])){ 
    echo '<h3>Post '.$_GET['status'].'.</h3>'; 
  } 
  ?>

      <?php
if ($req->rowCount() == 0) {?>
  <p style="text-align: center;">there are no article to moderate at the moment</p>
<?php
}
else
{ ?>

     <div class="table-responsive">
     <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">title</th>
      <th scope="col">creation_date</th>
      <th scope="col">edit_date</th>
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
      <td><?php if ($data['edit_date_fr'] == NULL) {
               echo "pas de mis a jour";
              
            }
            else{
               echo $data['edit_date_fr'];
          
            }?></td>
      <td><a class="btn btn-warning" href="admin.php?action=update&amp;id=<?php echo $data['id'];?>">Edit</a></td>
      <td><a class="btn btn-danger" href="#" onclick="delpost('<?php echo $data['id'];?>', '<?php echo $data['title'];?>');return false;">Delete</a></td>
    </tr>
      <?php
} 
$req->closeCursor();
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
          echo ' <a href="admin.php?action=admin&amp;page='.$i.'">'.$i.'</a> ';
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