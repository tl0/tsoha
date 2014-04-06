<?php
require_once("libs/common.php");

$stmt = $db->prepare("SELECT * FROM people WHERE userid = ?");

$stmt->execute(array($_GET['id']));

$user = $stmt->fetch();

showView("base", array(
	'innerContent' => "page/user"
));
