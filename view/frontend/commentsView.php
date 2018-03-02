<?php $title = htmlspecialchars($chapter['title']); ?>

<?php ob_start(); ?>

<!-- Page Header -->
    <header class="masthead" style="background-image: url('public/img/post-bg.jpg')">
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
    

    <!-- Post Content -->
    <article>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <h3>
        <?= $chapter['title']; ?>
        <em>le <?= $chapter['creation_date_fr']; ?></em>
    </h3>


    <?=$chapter['content'];?>
    

          </div>
        </div>
      </div>
    </article>
    <hr>

    <p>commentaire approuvé</p>
<?php
if ($approved->rowCount() == 0) {
  echo "there are no approved comments at the moment";
}
else{ 
while ($data = $approved->fetch())
{
?>
<p><strong><?= htmlspecialchars($data['author']); ?></strong> le <?= $data['comment_date_fr']; ?></p>
<p><?=htmlspecialchars($data['comment']); ?></p>
<?php
} 

}
?>

<p>commentaire en attente de moderation</p>   
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
    <button name="report">Downvote</button>
</form>
<?php
}
 
}
?>

<form action="index.php?action=addComment&amp;id=<?= $chapter['id'] ?>" method="post">
    <div>
        <label for="author">Auteur</label><br />
        <input type="text" id="author" name="author" />
    </div>
    <div>
        <label for="comment">Commentaire</label><br />
        <textarea id="comment" name="comment"></textarea>
    </div>
    <div>
        <input type="submit" />
    </div>
</form>

    <hr>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
