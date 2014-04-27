<?php
require_once("common.php");
$ext = array("gif", "jpeg", "jpg", "png");
$mimes = array("image/gif", "image/jpeg", "image/jpg", "image/png");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);

if ($_FILES["file"]["size"] < 2000000 && in_array($_FILES["file"]["type"], $mimes)) {
	if(!is_dir("upload")) {
		mkdir("upload");
	}
	if ($_FILES["file"]["error"] > 0) {
		error("Return Code: " . $_FILES["file"]["error"]);
	} else {
		$juttu = md5($_FILES["file"]["name"]."-".time()).".".$extension;
		move_uploaded_file($_FILES["file"]["tmp_name"], getcwd() . "/../upload/" . $juttu);
		$stmt = getDB()->prepare("INSERT INTO images (userid, imgpath, created) VALUES (?,?,?)");
		$stmt->execute(array(Account::getLoggedInAccount()->getPerson()->getId(), $juttu, time()));
		error("Lisätty: {$juttu}");

	}
} else {
	error("Virhe kuvan lähetyksessä, liian iso tai ei ole kuva? :(");
}
header("Location: " . $_SERVER['HTTP_REFERER']);
?>