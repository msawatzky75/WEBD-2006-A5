<?php
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
			<form action="update.php" method="post">
				<div id="postinput">
					<input type="text" name="title" value="<?=$row['title']?>" />
					<textarea name="post" rows="8" cols="75"><?=$row['post']?></textarea>
				</div>
				<input type="submit" name="submit" value="Post" />
			</form>
		</section>
	</body>
</html>
<?php else : 	header('Location: index.php'); //status 302 ?>
<?php endif; ?>
