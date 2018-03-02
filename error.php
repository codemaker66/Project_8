<?php $title = 'Erreur 404'; ?>

<?php ob_start(); ?>

<!-- Page Header -->
    <header class="masthead" style="background-image: url('public/img/error-bg.jpeg')">
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

        <h1>Erreur 404</h1>

        <p class="alert alert-danger">une erreur est survenue..si cela persiste veuillez contacter l'administrateur du site en lui expliquant ce que vous avez fait pour avoire ce resultat</p>

</div>
      </div>
    </div>

    <hr>

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>