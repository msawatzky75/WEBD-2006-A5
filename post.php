<?php
if(isset($_GET['id'])) :
	require('connect.php');
	$query = "SELECT * FROM posts WHERE id = :id";
	$statement = $db->prepare($query); // Returns a PDOStatement object.
	$statement->bindValue("id", $_GET['id']);
	$statement->execute(); // The query is now executed.
	 if ($statement->rowCount() > 0) :
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
				<section class="post" id='post<?=$statement->rowCount()+1?>'>
					<h3 class='title'><?=$row['title']?></h3>
					<small class='date'><?=$row['postdate']?></small>
					<p><?=$row['post']?></p>
				</section>
			</section>
		</body>
	</html>
	<?php else : 	header('Location: index.php'); //status 302 ?>
	<?php endif; ?>
<?php endif; ?>
