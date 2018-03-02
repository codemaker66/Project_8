<?php
  require_once(__DIR__ ."/../../controller/backend/controller.php");
  $session = new USER();
  if(!$session->is_loggedin())
  {
    // session no set redirects to login page
    $session->redirect('../../index.php');
  }
?>
<!DOCTYPE html>
<html lang="fr">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>welcome</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="public/css/clean-blog.min.css" rel="stylesheet">
  
  </head>

<body>

  <div class="container">
     
     <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">title</th>
      <th scope="col">creation_date</th>
      <th scope="col">edit</th>
      <th scope="col">delete</th>
    </tr>
  </thead>
  <tbody>
      <?php
while ($data = $req->fetch())
{
?>
<tr>
      <th scope="row"><?= $data['id']; ?></th>
      <td><?= $data['title']; ?></td>
      <td><?= $data['creation_date_fr']; ?></td>
      <td>edit</td>
      <td>edit</td>
    </tr>
      <?php
} 
$req->closeCursor();
?>   
  </tbody>
</table>


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


          




     
        
    


          <a href="admin.php?action=logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a>
       
        </div>

<script language="JavaScript" type="text/javascript">
function delpost(id, title)
{
  if (confirm("Are you sure you want to delete '" + title + "'"))
  {
      window.location.href = 'admin.php?delpost=' + id;
  }
}
</script>

<!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="public/js/clean-blog.min.js"></script>

</body>
</html>