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
			<?php require 'blogs.php'; ?>
		</section>
	</body>
</html>
