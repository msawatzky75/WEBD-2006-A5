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
			<form id='input' action="update.php" method="post">
					<input type="hidden" name="id" value="<?=$row['id']?>" />
					<div>
						<label for="title">Title</label>
						<input type="text" name="title" value="<?=$row['title']?>" />
					</div>
					<div>
						<label for="post">Content</label>
						<textarea name="post" rows="8" cols="75"><?=$row['post']?></textarea>
					</div>
					<div id="submits">
						<input id='post' type="submit" name="submit" value="Post" />
						<input id='delete' type="submit" name="delete" value="Delete" formaction="delete.php" />
					</div>
			</form>
		</section>
	</body>
</html>
<?php else : 	header('Location: index.php'); //status 302 ?>
<?php endif; ?>
