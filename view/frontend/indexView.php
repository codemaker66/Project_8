<?php $title = 'Accueil'; ?>

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
if ($req->rowCount() == 0) {?>
<p style="text-align: center;">there are no post at the moment</p>
<?php
}
else{ 
while ($chapters = $req->fetch())
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
              <p class="post-meta">pas de mis a jour pour cette article</p>
              <?php
            }
            else{?>
              <p class="post-meta">Mis a jour le <?=$chapters['edit_date_fr']; ?></p>
            <?php
            }?>

          </div>
        
         <?php
} 
$req->closeCursor();

echo '<p align="center">Page : '; //Pour l'affichage, on centre la liste des pages
for($i=1; $i<=$numberOfPages; $i++) //On fait notre boucle
{
     //On va faire notre condition
     if($i==$currentPage) //Si il s'agit de la page actuelle...
     {
         echo ' [ '.$i.' ] '; 
     }  
     else //Sinon...
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