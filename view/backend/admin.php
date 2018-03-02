<?php
	require_once(__DIR__ ."/../../controller/backend/session.php");
	require_once(__DIR__ ."/../../model/frontend/model.php");
	require_once(__DIR__ ."/../../model/backend/model.php");
    require_once(__DIR__ ."/../../model/dbManager.php");

    $test = new model();
    $req = $test->getChapters();

    $test = new Manager();
    $db = $test->dbConnect();
?>
<!DOCTYPE html>
<html lang="fr">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>welcome : <?php echo($userRow['user_name']); ?></title>

    <!-- Bootstrap core CSS -->
    <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="../../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="../../public/css/clean-blog.min.css" rel="stylesheet">
  
  </head>

<body>
     

          <p> Hi' <?php echo $userRow['user_email']; ?></p>
<?php
          if(isset($_GET['action'])){ 
    echo '<h3>Post '.$_GET['action'].'.</h3>'; 
} 


?>

        


<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">titre</th>
      <th scope="col">date</th>
      <th scope="col">update</th>
      <th scope="col">delete</th>
    </tr>
  </thead>
  <tbody>
    <?php
    while ($data = $req->fetch())
{
?>
    <tr>
      <th scope="row"><?php echo $data['id']; ?></th>
      <td><?php echo $data['title']; ?></td>
      <td><?php echo $data['creation_date_fr']; ?></td>
      <td><a href="edit-post.php?id=<?php echo $data['id'];?>">Edit</a></td>
      <td><a href="javascript:delpost('<?php echo $data['id'];?>','<?php echo $data['title'];?>')">Delete</a></td>
    </tr>
             <?php
} 
$req->closeCursor();
?>   
  </tbody>
</table>

<p><a href='add.php'>Add Post</a></p>


     
        
    


          <a href="../../controller/backend/logout.php?logout=true"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a>
       
        
    
    
    </div>

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
    <script src="../../vendor/jquery/jquery.min.js"></script>
    <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="../../public/js/clean-blog.min.js"></script>

</body>
</html>