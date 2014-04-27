<?php
require_once("libs/common.php");
require_once("libs/models/Person.php");

$user = Person::getUserByID($_GET['id']);

$allow_edit = (Account::getLoggedInAccount()->getAdmin() || Account::getLoggedInAccount()->getPerson()->getId() == $_GET['id']);
if(Account::getLoggedInAccount()->getAdmin() || Account::getLoggedInAccount()->getPerson()->getId() == $_GET['id'] || Person::getUserByID($_GET['id'])->getPublished()) {
	showView("base", array(
		'innerContent' => "page/user",
		'user' => $user,
		'edit' => $allow_edit,
		'questions' => Person::getUserByID($_GET['id'])->getAnswers(),
		'images' => Person::getUserByID($_GET['id'])->getImages(),
		'tagit' => Person::getUserByID($_GET['id'])->getTags()
	));
} else {

	error("WOW! Käyttäjän sivuja ei ole julkaistu! Mee pois!");
	showView("base", array(
		'innerContent' => 'page/error'
	));
}
