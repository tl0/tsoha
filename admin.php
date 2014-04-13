<?php
require_once("libs/common.php");

if (Account::getLoggedInAccount()->getAdmin()) {

	if(isset($_GET['id'])) {
		switch($_GET['action']) {
			case 'toggle':
				$stmt = getDB()->prepare("UPDATE people SET published = NOT published WHERE userid = ?");
				$stmt->execute(array($_GET['id']));
		}
		header("Location: admin.php");
	}


	$users = getDB()->prepare("SELECT * FROM people ORDER BY userid");
	$users->execute();
	showView("base", array(
		'innerContent' => "page/admin",
		'users' => $users->fetchAll(PDO::FETCH_CLASS)
	));
} else {
	error("Et ole kirjautuneena ylläpitäjän tunnuksella!");
	header("Location: index.php");
}
