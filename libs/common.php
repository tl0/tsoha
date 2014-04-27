<?php
session_start();
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);

// TODO jotaki
if (isset($_GET)) {
	foreach ($_GET as &$v) {
		$v = htmlspecialchars($v);
	}
}
if (isset($_POST)) {
	foreach ($_POST as &$v) {
		$v = htmlspecialchars($v);
	}
}

require_once("connect.php");
require_once("models/Account.php");
require_once("models/Person.php");
require_once("models/Image.php");

function showView($page, $data = array())
{
	global $_SESSION; // $db -variable näkymään myös kaikille näille ;#
	$pagePath = "views/" . strip_tags(trim($page)) . ".php";
	$data = (object)$data;
	if (file_exists($pagePath)) {
		require("views/" . $page . ".php");
	} else {
		require("views/page/error.php");
	}
}

function getDB()
{
	global $db;
	return $db;
}

function error($message)
{
	$_SESSION['tsoha-errors'][] = $message;
}

?>
