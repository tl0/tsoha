<?php
require_once("libs/common.php");
if(isset($_SESSION['tsoha-register-tempdata'])) {
	$tempdata = $_SESSION['tsoha-register-tempdata']; // Kenttien esitäyttöä varten jne
}
showView("base", array(
	'innerContent' => "page/add"
));
