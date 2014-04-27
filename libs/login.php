<?php
	require_once("common.php");

	if($_GET['a'] == "logout") {
		$del = getDB()->prepare("DELETE FROM sessions WHERE sessid = ?");
		$del->execute(array($_SESSION['tsoha-session']));
		unset($_SESSION['tsoha-session']);
	}

	if(isset($_POST['login-email']) && isset($_POST['login-password'])) {
		$le = $_POST['login-email'];
		$lp = $_POST['login-password'];

		$st = getDB()->prepare("SELECT * FROM account WHERE email = ? AND password = ? LIMIT 1");
		$st->execute(array($le, $lp));

		$t = $st->fetchObject();
		if($t != null) {

			$_SESSION["tsoha-session"] = session_id();
			$sess = getDB()->prepare("INSERT INTO sessions (sessid, accid, timecreated, timeused) VALUES (?, ?, ?, ?)");
			$sess->execute(array(session_id(), $t->accid, time(), time()));
			error("Tervetuloa, olet kirjautunut sisään.");
		} else {
			error("Virheellinen kirjautuminen!");
		}
		var_dump(getDB()->errorInfo());
	}

	header("Location: " . $_SERVER['HTTP_REFERER']);