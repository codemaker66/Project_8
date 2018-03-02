<?php $title = 'Comments'; ?>

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
     
     
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">author</th>
      <th scope="col">creation_date</th>
      <th scope="col">comment</th>
      <th scope="col">delete</th>
    </tr>
  </thead>
  <tbody>
      <?php
while ($comment = $comments->fetch())
{
?>
<tr>
      <th scope="row"><?= $comment['id']; ?></th>
      <td><?= htmlspecialchars($comment['author']); ?></td>
      <td><?= $comment['comment_date_fr']; ?></td>
      <td><?=htmlspecialchars($comment['comment']); ?></td>
      <td>delete</td>
    </tr>
      <?php
} 
$comments->closeCursor();
?>   
  </tbody>
</table>   
       
        </div>
      </div>
    </div>
    <hr>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>