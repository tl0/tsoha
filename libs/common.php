<?php
	session_start();
	ini_set('display_startup_errors',1);
	ini_set('display_errors',1);

	require_once("connect.php");
	function showView($page, $data = array()) {
		global $db, $_SESSION; // $db -variable näkymään myös kaikille näille ;#
		$pagePath = "views/". strip_tags(trim($page)) .".php";
		$data = (object) $data;
		if(file_exists($pagePath)) {
			require("views/". $page .".php");
		} else {
			echo "<div class=\"bg-danger\">ERROR! :-D Invalid view :O</div>";
		}
	}
?>
