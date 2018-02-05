<?php
if ($_POST)
{
	print_r($_POST);
	if (strlen($_POST['post']) > 0 && strlen($_POST['post']) < 10001)
	{
		require('connect.php');
		$query = "UPDATE posts SET postdate = :currentDate, title = :title, post = :post WHERE id = :id;";
		$statement = $db->prepare($query);
		$statement->bindValue(':id', $_POST['id']);
		$statement->bindValue(':currentDate', date("F j, Y"));
		$statement->bindValue(':title', filter_input(INPUT_POST, "title", FILTER_SANITIZE_FULL_SPECIAL_CHARS));
		$statement->bindValue(':post', filter_input(INPUT_POST, "post", FILTER_SANITIZE_FULL_SPECIAL_CHARS));
		$statement->execute();
		header('Location: index.php'); //status 302
		die();
	}
}
header('Location: index.php?error=update');
?>
