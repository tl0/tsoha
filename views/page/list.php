<h1>Henkilöt</h1>
<div class="row text-center">
<?php
global $users;
foreach( $users as $row ) {
	echo "<div class=\"col-lg-3 col-md-6 hero-feature\">
				<div class=\"thumbnail\">
					<img src=\"http://placehold.it/800x500\" alt=\"\">
					<div class=\"caption\">
						<h3>" . $row['name'] . "</h3>
						<p>" . $row['descr'] . "</p>
						<p><a href=\"user.php?id=" . $row['userid'] . "\" class=\"btn btn-default\">Siirry</a>
						</p>
					</div>
				</div>
			</div>";
}
?>
</div>
