<?php 
require_once(__DIR__ ."/../../model/dbManager.php");

$test = new Manager();
    $db = $test->dbConnect();
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Admin - Add Post</title>
  <link rel="stylesheet" href="../style/normalize.css">
  <link rel="stylesheet" href="../style/main.css">
  <script src="//tinymce.cachefly.net/4.0/tinymce.min.js"></script>
  <script>
          tinymce.init({
              selector: "textarea",
              plugins: [
                  "advlist autolink lists link image charmap print preview anchor",
                  "searchreplace visualblocks code fullscreen",
                  "insertdatetime media table contextmenu paste"
              ],
              toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
          });
  </script>
</head>
<body>

<div id="wrapper">


	<h2>Add Post</h2>

	<?php

	
	if(isset($_POST['submit'])){

		$_POST = array_map( 'stripslashes', $_POST );

		
		extract($_POST);

		
		if($postTitle ==''){
			$error[] = 'Please enter the title.';
		}

		

		if($postCont ==''){
			$error[] = 'Please enter the content.';
		}

		if(!isset($error)){

			try {

				$stmt = $db->prepare('INSERT INTO chapters (title,content,creation_date) VALUES (:postTitle, :postCont, :postDate)') ;
				$stmt->execute(array(
					':postTitle' => $postTitle,
					':postCont' => $postCont,
					':postDate' => date('Y-m-d H:i:s')
				));

				header('Location: admin.php?action=added');
				exit;

			} catch(PDOException $e) {
			    echo $e->getMessage();
			}

		}

	}

	if(isset($error)){
		foreach($error as $error){
			echo '<p class="error">'.$error.'</p>';
		}
	}
	?>

	<form action='' method='post'>

		<p><label>Title</label><br />
		<input type='text' name='postTitle' value='<?php if(isset($error)){ echo htmlspecialchars($_POST['postTitle']);}?>'></p>

		<p><label>Content</label><br />
		<textarea name='postCont' cols='60' rows='10'><?php if(isset($error)){ echo htmlspecialchars($_POST['postCont']);}?></textarea></p>

		<p><input type='submit' name='submit' value='Submit'></p>

	</form>

</div>

</body>