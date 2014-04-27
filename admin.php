<?php
require_once("libs/common.php");

if (Account::getLoggedInAccount()->getAdmin()) {

	if(isset($_GET['id'])) {
		switch($_GET['action']) {
			case 'toggle':
				$stmt = getDB()->prepare("UPDATE people SET published = NOT published WHERE userid = ?");
				$stmt->execute(array($_GET['id']));
			case 'removeq':
				$stmt = getDB()->prepare("DELETE FROM questions WHERE qid = ?");
				$stmt->execute(array($_GET['id']));
		}
		header("Location: admin.php");
	}

	if(isset($_POST['kysymys'])) {
		$q = getDB()->prepare("INSERT INTO questions (question) VALUES (?)");
		$q->execute(array(strip_tags(trim($_POST['kysymys']))));
		echo "!!!";
	}


	$users = getDB()->prepare("SELECT * FROM people ORDER BY userid");
	$users->execute();

	$questions = getDB()->prepare("SELECT * FROM questions");
	$questions->execute();

	showView("base", array(
		'innerContent' => "page/admin",
		'users' => $users->fetchAll(PDO::FETCH_CLASS),
		'questions' => $questions->fetchAll(PDO::FETCH_CLASS)
	));
} else {
	error("Et ole kirjautuneena ylläpitäjän tunnuksella!");
	header("Location: index.php");
}
