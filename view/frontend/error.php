<?php $title = 'Erreur'; ?>

<?php ob_start(); ?>

<!-- Page Header -->
    <header class="masthead" style="background-image: url('public/img/error-bg.jpeg')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading">
              <h1>Oops..!!</h1>
              <span class="subheading">Erreur 404</span>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- Main Content -->
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
        <p class="alert alert-danger">Une erreur est survenue..si cela persiste veuillez contacter l'administrateur du site pour lui expliqer ce que vous avez fait pour avoir ce resultat</p>
        </div>
      </div>
    </div>
    <hr>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>