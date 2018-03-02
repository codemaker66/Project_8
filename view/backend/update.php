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
     
    <h2>Add Post</h2>

  <?php if(isset($error)){
    foreach($error as $error){
      echo '<p class="error">'.$error.'</p>';
    }
  } ?>

  <form action='' method='post'>

    <input type='hidden' name='id' value='<?php echo $data['id'];?>'>

    <p><label>Title</label><br />
    <?php echo '<input type="text" name="title" value="'.$data['title'].'">';?></p>


    <p><label>Content</label><br />
    <textarea name='content' cols='60' rows='10'><?php echo $data['content'];?></textarea></p>

    <p><input type='submit' name='submit' value='Submit'></p>

  </form>



       
        </div>
      </div>
    </div>
    <hr>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>