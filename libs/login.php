<?php
	require_once("common.php");

	if($_GET['a'] == "logout") {
		unset($_SESSION['tsoha-session']);
	}

	if(isset($_POST['login-email']) && isset($_POST['login-password'])) {
		$le = $_POST['login-email'];
		$lp = $_POST['login-password'];

		$st = $db->prepare("SELECT * FROM account WHERE email = ? AND password = ? LIMIT 1");
		$st->execute(array($le, $lp));

		$t = $st->fetchObject();
		if($t != null) {

			$_SESSION["tsoha-session"] = session_id();
			$sess = $db->prepare("INSERT INTO sessions (sessid, accid, timecreated, timeused) VALUES (?, ?, ?, ?)");
			$sess->execute(array(session_id(), $t->accid, time(), time()));
			error("Tervetuloa, olet kirjautunut sisään.");
		} else {
			error("Virheellinen kirjautuminen!");
		}
	}

	header("Location: " . $_SERVER['HTTP_REFERER']);