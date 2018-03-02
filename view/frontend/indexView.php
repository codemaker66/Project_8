<?php $title = 'accueil'; ?>

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
while ($data = $req->fetch())
{
?>
          <div class="post-preview">
            <a href="index.php?action=listPosts&amp;id=<?= $data['id']; ?>">
              <h2 class="post-title">
                <?= $data['title']; ?>
              </h2>
            </a>
            <p class="post-meta">Posted by
              <a href="#">Jean Forteroche</a>
              le <?= $data['creation_date_fr']; ?></p>
          </div>
        
         <?php
} 
$req->closeCursor();
?>       

</div>
      </div>
    </div>

    <hr>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>