<?php
	require 'authenticate.php';
	require 'connect.php';
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
			<form id='input' action="insert.php" method="post">
					<div>
						<label for="title">Title</label>
						<input type="text" name="title" value="" />
					</div>
					<div>
						<label for="post">Content</label>
						<textarea name="post" rows="8" cols="75"></textarea>
					</div>
					<div id="submits">
						<input id='post' type="submit" name="submit" value="Post" />
					</div>
			</form>
		</section>
	</body>
</html>
