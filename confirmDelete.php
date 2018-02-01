<?php
require 'authenticate.php';
if(isset($_GET['id'])):
	require('connect.php');
	$query = "SELECT * FROM posts WHERE id = :id";
	$statement = $db->prepare($query); // Returns a PDOStatement object.
	$statement->bindValue("id", $_GET['id']);
	$statement->execute(); // The query is now executed.
	$row = $statement->fetch();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>My Blog</title>
		<link rel="stylesheet" href="styles.css">
	</head>
	<body>
		<section id="container">
			<?php require 'header.php'; ?>
			<h2>Do you want to delete this post?</h2>
			<section class="post" id='post<?=$statement->rowCount()+1?>'>
				<h3 class='title'><?=$row['title']?></h3>
				<small class='date'><?=$row['postdate']?></small>
				<p><?=$row['post']?></p>
			</section>
			<form action="delete.php" method="post">
				<input type="hidden" name="id" value="<?=$_GET['id']?>" />
				<input id="" type="submit" name="" value="Delete" />
			</form>
		</section>
	</body>
</html>
<?php else : 	header('Location: index.php'); //status 302 ?>
<?php endif; ?>
