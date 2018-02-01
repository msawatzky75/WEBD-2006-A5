<?php
	require('connect.php');
	$query = "SELECT * FROM posts";
	$statement = $db->prepare($query); // Returns a PDOStatement object.
	$statement->execute(); // The query is now executed.
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
			<form action="insert.php" method="post">
				<div id="postinput">
					<input type="text" name="title" value="" placeholder="Title" />
					<textarea name="post" rows="8" cols="75" placeholder="Your post here."></textarea>
				</div>
				<input type="submit" name="submit" value="Post" />
			</form>
		</section>
	</body>
</html>
