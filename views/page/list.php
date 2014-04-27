<script type="text/javascript" src="js/jquery.liveFilter.js"></script>
<h1>
	Henkilöt
	<span class="pull-right label label-primary"><input type="text" id="filter-input" class="form-control" placeholder="Filter"></span>
</h1>
<hr>
<div class="row text-center" id="userlist">
<?php
global $users;
foreach( $users as $row ) {
	echo "<div class=\"col-lg-3 col-md-6 hero-feature\" id='person'>
				<div class=\"thumbnail\">
					<img src=\"",(Person::getUserByID($row['userid'])->getDefaultimg() != null) ? "upload/".Person::getUserByID($row['userid'])->getDefaultImgPath() : "http://placehold.it/800x500","\" alt=\"\">
					<div class=\"caption\">
						<h3>" . $row['name'] . "</h3>
						<p>" . mb_substr($row['descr'], 0, 50) . "</p>
						<p><a href=\"user.php?id=" . $row['userid'] . "\" class=\"btn btn-default\">Siirry</a>
						</p>
					</div>
				</div>
			</div>\n";
}
?>
</div>

<script type="text/javascript">
	$(function() {
		$('#userlist').liveFilter('#filter-input', 'div#person', {
			filterChildSelector: 'h3'
		});
	});
</script>
