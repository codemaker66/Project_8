<?php $title = 'Ajouter un article';

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
        <div class="col-lg-8 col-md-10 mx-auto">
     
          <h2>Ajouter un article</h2>
    
            <?php 
            //show an error if it exists in the array $error
            if(isset($error)){
              foreach($error as $error){
                echo '<p class="alert alert-danger">'.$error.' !!</p>';
              }
            } ?>

          <form method='post'>
            <div class="form-group">
            <label>Titre</label>
            <input class="form-control" type='text' name='postTitle' value='<?php if(isset($error)){ echo $_POST['postTitle'];}?>'>
          </div>
            <div class="form-group">
            <label>contenu</label>
            <textarea name='postCont' cols='60' rows='10'><?php if(isset($error)){ echo $_POST['postCont'];}?></textarea>
          </div>
            <div class="form-group">
            <input class="btn btn-success" type='submit' name='submit' value="Créer l'article">
          </div>
          </form>
 
        </div>
      </div>
    </div>
<hr>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>