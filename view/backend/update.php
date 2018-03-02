<?php $title = 'Mettre à jour un article';

//call the backend model file: UserModel.php and create an object from the class USER
require_once(__DIR__ ."/../../model/backend/UserModel.php");

$session = new USER();

if(!$session->is_loggedin())
{
  //if session is not set then we redirects to the index page
  $session->redirect('index.php');
}
?>

<?php ob_start(); ?>



  <!-- Main Content -->
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
     
          <h2>Mettre à jour l'article</h2>

            <?php
            //show an error if it exists in the array $error
             if(isset($error)){
              foreach($error as $error){
                echo '<p class="alert alert-danger">'.$error.' !!</p>';
              }
            } ?>

          <form method='post'>

            <input type='hidden' name='id' value='<?php echo $data['id'];?>'>
            <div class="form-group">
            <label>Titre</label>
            <?= '<input type="text" class="form-control" name="title" value="'.$data['title'].'">';?>
            </div>

            <div class="form-group">
            <label>contenu</label>
            <textarea name='content' cols='60' rows='10'><?php echo $data['content'];?></textarea>
            </div>
            <div class="form-group">
            <input class="btn btn-success" type='submit' name='submit' value='Mettre à jour'>
          </div>
          </form>
 
        </div>
      </div>
    </div>
<hr>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>