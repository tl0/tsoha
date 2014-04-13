<?php
require_once("common.php");

if (isset($_POST['add-submit'])) {
	$name = $_POST['register-name'];
	$des = $_POST['register-descr'];
	$tags = $_POST['register-tags'];
	$email = $_POST['register-email'];
	$ps = $_POST['register-pswd'];
	$ps2 = $_POST['register-pswd2'];

	if (isset($name) && isset($des) && isset($email) && isset($ps) && isset($ps2)) {
		// TODO Lisää tarkistuksia
		if ($ps === $ps2) {
			$st = $db->prepare("INSERT INTO account (email, password) VALUES (?, ?)");
			$st->execute(array($email, $ps));

			$t = $st->fetchObject();
			if ($t != null) {
				$st2 = $db->prepare("INSERT INTO people (name, descr) VALUES (?, ?)");
				$st2->execute(array($name, $des));
				$t2 = $st2->fetchObject();
				if ($t2 != null) {
					// TODO Tagit vaatii refactorointia
					// TODO Lisää tagit tietokantaan explode(",") jne... Ensin ^^
					error("Rekisteröinti onnistui.");
					unset($_SESSION['tsoha-register-tempdata']);
				}
			} else {
				error("Tunnuksen luonti epäonnistui! Ei näin! >:(");
			}
		} else {
			error("Hei, salasanasi ei nyt oikein täsmää!");
		}
	} else {
		error("Nyt taisi joku kenttä jäädä täyttämättä... ? Onneksi täytetyt on jo esitäytetty! :D");
	}
}
$_SESSION['tsoha-register-tempdata'] = $_POST;
header("Location: " . $_SERVER['HTTP_REFERER']);
