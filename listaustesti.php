<?php
require_once("connect.php");
/*
 * Ylläoleva tiedosto on .gitignoressa, joten salasana ei vuoda ulkopuolisille :-)
 *
 * Sisältö on yksinkertaisuudessaan seuraava:
 *
 * $db = new PDO('pgsql:dbname=KAYTTAJATUNNUS;host:localhost;user=KAYTTAJATUNNUS;password=SALASANA');
 */

$stmt = $db->prepare("SELECT * FROM people");

$stmt->execute();

foreach( $stmt as $row )
{
	echo "<p>" . $row['userid'] . " &bull; " . $row['name'] . " &bull; " . $row['descr'] . "</p>";
}

?>
