<?php $title = 'Login'; ?>

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



<form class="form-signin" method="post">
      
        <h2>s'identifier</h2>
        <hr />
        
        
        <?php
      if(isset($error))
      {
        ?>
                <div class="alert alert-danger">
                   <?php echo $error; ?> 
                </div>
                <?php
      }
    ?>
        
        
        <div class="form-group">
        <input type="text" class="form-control" name="txt_uname_email" placeholder="Nom d'administrateur ou E-mail" required />
        </div>
        
        <div class="form-group">
        <input type="password" class="form-control" name="txt_password" placeholder="Votre mot de passe" />
        </div>
       
      <hr />
        
        <div class="form-group">
            <button type="submit" name="btn-login" class="btn btn-default">
                 Se connecter
            </button>
        </div>  
     
      </form>



</div>
      </div>
    </div>

    <hr>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>