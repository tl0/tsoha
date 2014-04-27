<?php
require_once("common.php");

	$pk = strip_tags(trim($_POST['pk']));
	$name = strip_tags(trim($_POST['name']));
	$value = strip_tags(trim($_POST['value']));

	if($pk != "" && $name != "") {
		$sess = getDB()->prepare("UPDATE people SET ".$name." = :descr WHERE userid = :id");
		$sess->bindValue(":descr", $value);
		$sess->bindValue(":id", $pk);
		$sess->execute();
		echo "!!!";
	}

var_dump($_POST);
