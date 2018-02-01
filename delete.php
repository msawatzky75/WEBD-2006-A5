<?php
require 'authenticate.php';
if(isset($_POST['id']))
{
	require('connect.php');
	$query = "DELETE FROM posts WHERE id = :id";
	$statement = $db->prepare($query); // Returns a PDOStatement object.
	$statement->bindValue("id", $_POST['id']);
	$statement->execute(); // The query is now executed.
	header('Location: index.php'); //status 302
}
?>
