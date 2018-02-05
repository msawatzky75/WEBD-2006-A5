<?php
	require('connect.php');
	$query = "SELECT * FROM posts ORDER BY id DESC";
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

			<?php if (isset($_GET['error'])) : ?>
				<?php if ($_GET['error'] == 'insert') : ?>
					<h4 id="errorMessage">There was an error creating the post.</h4>
				<?php elseif ($_GET['error'] == 'update') : ?>
					<h4 id="errorMessage">There was an error updating the post.</h4>
				<?php else : ?>
					<h4 id="errorMessage">Other error.</h4>
				<?php endif; ?>
			<?php endif; ?>

			<?php require 'posts.php'; ?>
		</section>
	</body>
</html>
