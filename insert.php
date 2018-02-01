<?php
if ($_POST)
{
	print_r($_POST);
	if (strlen($_POST['post']) > 0 && strlen($_POST['post']) < 10001)
	{
		require('connect.php');
		$query = "INSERT INTO posts (postdate, title, post) VALUES (:currentDate, :title, :post);";
		$statement = $db->prepare($query);
		$statement->bindValue(':currentDate', date("F j, Y"));
		$statement->bindValue(':title', $_POST['title']);
		$statement->bindValue(':post', $_POST['post']);
		$statement->execute();
		header('Location: index.php'); //status 302
		die();
	}
}
header('Location: index.php?error=true');
?>
