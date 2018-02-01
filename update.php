<?php
if ($_POST)
{
	print_r($_POST);
	if (strlen($_POST['post']) > 0 && strlen($_POST['post']) < 10001)
	{
		require('connect.php');
		$query = "UPDATE posts SET postdate = :currentDate, title = :title, post = :post;";
		$statement = $db->prepare($query);
		$statement->bindValue(':currentDate', date("F j, Y"));
		$statement->bindValue(':title', $_POST['title']);
		$statement->bindValue(':post', $_POST['post']);
		$statement->execute();
		header('Location: index.php'); //status 302
		die();
	}
}
header('Location: index.php?error=update');
?>
