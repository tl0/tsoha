<?php
$stmt = getDB()->prepare("SELECT * FROM people WHERE published = true ORDER BY random() LIMIT 4");

$stmt->execute();

foreach( $stmt as $row ) {
	echo "<div class=\"col-lg-3 col-md-6 hero-feature\">
				<div class=\"thumbnail\">
					<img src=\"",(Person::getUserByID($row['userid'])->getDefaultimg() != null) ? "upload/".Person::getUserByID($row['userid'])->getDefaultImgPath() : "http://placehold.it/800x500","\" alt=\"\">
					<div class=\"caption\">
						<h3>" . $row['name'] . "</h3>
						<p>" . mb_substr($row['descr'], 0, 50) . "</p>
						<p><a href=\"user.php?id=" . $row['userid'] . "\" class=\"btn btn-default\">Siirry</a>
						</p>
					</div>
				</div>
			</div>";
}
?>
