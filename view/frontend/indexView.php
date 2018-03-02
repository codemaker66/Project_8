<?php $title = 'accueil'; ?>

<?php ob_start(); ?>

<!-- Page Header -->
    <header class="masthead" style="background-image: url('public/img/home-bg.jpg')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="post-heading">
              <h1>Man must explore, and this is exploration at its greatest</h1>
              <h2 class="subheading">Problems look mighty small from 150 miles up</h2>
              <span class="meta">Posted by
                <a href="#">Start Bootstrap</a>
                on August 24, 2018</span>
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
                <?= htmlspecialchars($data['title']); ?>
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