<?php $title = $chapter['title']; ?>

<?php ob_start(); ?>

<!-- Page Header -->
    <header class="masthead" style="background-image: url('public/img/post-bg.jpg')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="post-heading">
              <h1><?= $chapter['title']; ?></h1>
              <h2 class="subheading">Publié par Jean Forteroche le <?= $chapter['creation_date_fr']; ?></h2>
              <?php if ($chapter['edit_date_fr'] == NULL) {?>
              <span class="meta">pas de mis a jour pour cette article</span>
              <?php
            }
            else{?>
              <span class="meta">Mis a jour le <?=$chapter['edit_date_fr']; ?></span>
            <?php
            }?>
            </div>
          </div>
        </div>
      </div>
    </header>
    

    <!-- Post Content -->
    <article>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">


    <?=$chapter['content'];?>
    

          </div>
        </div>
      </div>
    </article>
    <hr>

    <aside>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
<div class="alert alert-success">
    <h2>commentaire approuvé</h2>
<?php
if ($approvedComments->rowCount() == 0) {
  echo "there are no approved comments at the moment";
}
else{ 
while ($approved = $approvedComments->fetch())
{
?>
<p><strong><?= htmlspecialchars($approved['author']); ?></strong> le <?= $approved['comment_date_fr']; ?></p>
<p><?=htmlspecialchars($approved['comment']); ?></p>
<?php
} 

}
?>
</div>
<div class="alert alert-warning">
<h2>commentaire en attente de moderation</h2>   
    <?php
if ($comments->rowCount() == 0) {
  echo "there are no comments waiting for moderation at the moment";
}
else{ 
while ($comment = $comments->fetch())
{
?>
<p><strong><?= htmlspecialchars($comment['author']); ?></strong> le <?= $comment['comment_date_fr']; ?></p>
<p><?=htmlspecialchars($comment['comment']); ?></p>
<form action="index.php?action=report&amp;id=<?= $comment['id'] ?>&amp;chapter_id=<?= $chapter['id'] ?>" method="post">
    <button class="btn btn-danger" name="report">signaler</button>
</form>
<?php
}
 
}
?>
</div>

<div class=" alert alert-info">
<h3>Ajouter un commentaire</h3>

<form action="index.php?action=addComment&amp;id=<?= $chapter['id'] ?>" method="post">
    <div class="form-group">
        <label for="author">Auteur</label><br />
        <input type="text" class="form-control" id="author" name="author" required />
    </div>
    <div class="form-group">
        <label for="comment">Commentaire</label><br />
        <textarea class="form-control" id="comment" name="comment" required></textarea>
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" />
    </div>
</form>
</div>
</aside>
</div>
        </div>
      </div>

    <hr>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
