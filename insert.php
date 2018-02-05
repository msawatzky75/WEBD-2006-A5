<?php
if ($_POST)
{
	print_r($_POST);
	if ((strlen($_POST['post']) > 0 && strlen($_POST['post']) < 10001) && (strlen($_POST['title']) > 0 && strlen($_POST['title']) < 101))
	{
		require('connect.php');
		$query = "INSERT INTO posts (postdate, title, post) VALUES (:currentDate, :title, :post);";
		$statement = $db->prepare($query);
		$statement->bindValue(':currentDate', date("F d, Y g:i a"));
		$statement->bindValue(':title', filter_input(INPUT_POST, "title", FILTER_SANITIZE_FULL_SPECIAL_CHARS));
		$statement->bindValue(':post', filter_input(INPUT_POST, "post", FILTER_SANITIZE_FULL_SPECIAL_CHARS));
		$statement->execute();
		header('Location: index.php'); //status 302
		die();
	}
}
header('Location: index.php?error=insert');
?>
