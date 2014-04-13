<?php
$stmt = getDB()->prepare("SELECT * FROM people WHERE published = true ORDER BY random() LIMIT 4");

$stmt->execute();

foreach( $stmt as $row ) {
	echo "<div class=\"col-lg-3 col-md-6 hero-feature\">
				<div class=\"thumbnail\">
					<img src=\"http://placehold.it/800x500\" alt=\"\">
					<div class=\"caption\">
						<h3>" . $row['name'] . "</h3>
						<p>" . $row['descr'] . "</p>
						<p><a href=\"user/" . $row['userid'] . "\" class=\"btn btn-default\">Siirry</a>
						</p>
					</div>
				</div>
			</div>";
}
?>
