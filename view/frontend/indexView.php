<?php $title = 'Accueil'; ?>

<?php ob_start(); ?>

<!-- Page Header -->
    <header class="masthead" style="background-image: url('public/img/home-bg.jpg')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading">
              <h1>Bienvenue sur mon blog</h1>
              <span class="subheading">Je vous souhaite une bonne lecture</span>
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
          if ($req->rowCount() == 0) {
          ?>
            <p style="text-align: center;">Il n'y a pas d'articles pour le moment..</p>
          <?php
          }
          else{

            while ($chapters = $req->fetch(PDO::FETCH_ASSOC))
            {
            ?>
              <div class="post-preview">
                <a href="index.php?action=listPosts&amp;id=<?= $chapters['id']; ?>">
                  <h2 class="post-title">
                    <?= $chapters['title']; ?>
                  </h2>
                  <h3 class="post-subtitle">
                    Publié par Jean Forteroche le <?= $chapters['creation_date_fr']; ?>
                  </h3>
                </a>
                  <?php if ($chapters['edit_date_fr'] == NULL) {?>
                    <p class="post-meta">Pas de mise à jour pour cet article</p>
                  <?php
                  }
                  else{?>
                    <p class="post-meta">Mis à jour le <?=$chapters['edit_date_fr']; ?></p>
                  <?php
                  }?>
              </div>
            <?php
            } 
            $req->closeCursor();

            echo '<p style="text-align: center;">Page : ';
              for($i=1; $i<=$numberOfPages; $i++)
              { 
                   if($i==$currentPage)
                   {
                       echo ' [ '.$i.' ] '; 
                   }  
                   else
                   {
                        echo ' <a href="index.php?page='.$i.'">'.$i.'</a> ';
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