<?php
public function displayPost($row)
{
	echo "<h3 class='title'><?=$row['title']?></h3>";
	echo "<small class='date'><?=$row['postdate']?></small>";
	echo "<p><?=substr($row['post'], 0, 200)?></p>";
}
?>
