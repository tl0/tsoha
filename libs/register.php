<?php
require_once("common.php");

if (isset($_POST['add-submit'])) {
	$name = $_POST['register-name'];
	$des = $_POST['register-descr'];
	$tagit = $_POST['register-tags'];
	$email = $_POST['register-email'];
	$ps = $_POST['register-pswd'];
	$ps2 = $_POST['register-pswd2'];

	if (isset($name) && isset($des) && isset($email) && isset($ps) && isset($ps2)) {
		// TODO Lisää tarkistuksia
		if ($ps === $ps2) {
			$st = getDB()->prepare("INSERT INTO account (email, password) VALUES (?, ?)");
			$st->execute(array($email, $ps));

			$e = getDB()->lastInsertId("acc_id_seq");
			$t = $st->fetchObject();
			if ($t != null) {
				$st2 = getDB()->prepare("INSERT INTO people (name, descr, accid) VALUES (?, ?, ?)");
				$st2->execute(array($name, $des, $e));

				var_dump(getDB()->errorInfo());

				$e2 = getDB()->lastInsertId("user_id_seq");
				$t2 = $st2->fetchObject();
				if ($t2 != null) {
					$sa = getDB()->prepare("UPDATE account SET userid = ? WHERE accid = ?");
					$sa->execute(array($e2, $e));
					// TODO Tagit vaatii refactorointia
					// TODO Lisää tagit tietokantaan explode(",") jne... Ensin ^^

					$tags = getDB()->prepare("INSERT INTO tags (tagname) VALUES (?)");
					$tags2 = getDB()->prepare("INSERT INTO tagset (userid, tagid) VALUES (?, ?)");
					foreach(explode(",", $tagit) as $v) {
						$tags->execute(array($v));
						$tags2->execute(array($e2, getDB()->lastInsertId("tag_id_seq")));
					}


					error("Rekisteröinti onnistui. Voit kirjaudu sisään, ja tarkastella sivuasi, muut ei näe sitä. Vaatii ylläpitäjän hyväksymisen.");
					unset($_SESSION['tsoha-register-tempdata']);
					header("Location: index.php");
				}
			} else {
				error("Tunnuksen luonti epäonnistui! Ei näin! >:(");
			}
		} else {
			error("Hei, salasanasi ei nyt oikein täsmää!");
		}
	} else {
		error("Nyt taisi joku kenttä jäädä täyttämättä... ? Onneksi täytetyt on jo esitäytetty! :D");
$_SESSION['tsoha-register-tempdata'] = $_POST;
	}
}

header("Location: " . $_SERVER['HTTP_REFERER']);
