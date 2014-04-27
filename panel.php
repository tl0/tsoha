<?php
require_once("libs/common.php");

if (Account::getLoggedInAccount()->getPerson()->getId() != null) {

	if(isset($_GET['removeimg'])) {
		Image::getImageByID($_GET['removeimg'])->remove();
	}

	if(isset($_GET['defaultimg'])) {
		$temp = Account::getLoggedInAccount()->getPerson();
		$temp->setDefaultimg($_GET['defaultimg']);
		$temp->save();
	}

	if(isset($_POST['name'])) {

		$pk = strip_tags(trim($_POST['pk']));
		$name = strip_tags(trim($_POST['name']));
		$value = strip_tags(trim($_POST['value']));

		$ans = getDB()->prepare("INSERT INTO answer (qid, userid, answ) VALUES (?, ?, ?)");
		$ans->execute(array($pk, Account::getLoggedInAccount()->getPerson()->getId(), $value));
		if(getDB()->errorCode() != null) {
			$ans = getDB()->prepare("UPDATE answer SET answ = ? WHERE userid = ? AND qid = ?");
			$ans->execute(array($value, Account::getLoggedInAccount()->getPerson()->getId(), $pk));
		}
		echo "!!!";
		print_r($_POST);
		exit();
	}

	$u = getDB()->prepare("SELECT * FROM people WHERE id = ?");
	$u->execute(array(Account::getLoggedInAccount()->getUserId()));

	$questions = getDB()->prepare("SELECT * FROM questions");
	$questions->execute();

	showView("base", array(
		'innerContent' => "page/userpanel",
		'user' => $u->fetchAll(PDO::FETCH_CLASS),
		'questions' => $questions->fetchAll(PDO::FETCH_CLASS),
		'answers' => Account::getLoggedInAccount()->getPerson()->getAnswers(),
		'images' => Account::getLoggedInAccount()->getPerson()->getImages()
	));
} else {
	error("Et ole kirjautuneena!");
	header("Location: index.php");
}
