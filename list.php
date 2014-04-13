<?php
require_once("libs/common.php");

$users = $db->prepare("SELECT * FROM people WHERE published = true");

$users->execute();

showView("base", array(
	'innerContent' => "page/list",
	'users' => $users
));
