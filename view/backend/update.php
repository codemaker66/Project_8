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
        <div class="col-lg-8 col-md-10 mx-auto">
     
    <h2>Update post</h2>

  <?php if(isset($error)){
    foreach($error as $error){
      echo '<p class="alert alert-danger">'.$error.' !!</p>';
    }
  } ?>

  <form action='' method='post'>

    <input type='hidden' name='id' value='<?php echo $data['id'];?>'>
    <div class="form-group">
    <label>Title</label>
    <?php echo '<input type="text" class="form-control" name="title" value="'.$data['title'].'">';?>
    </div>

    <div class="form-group">
    <label>Content</label>
    <textarea name='content' cols='60' rows='10'><?php echo $data['content'];?></textarea>
    </div>
    <div class="form-group">
    <input class="btn btn-success" type='submit' name='submit' value='Submit'>
  </div>
  </form>



       
        </div>
      </div>
    </div>
    <hr>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>