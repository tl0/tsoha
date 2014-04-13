<?php
global $user;
?><div class="row">

	<div class="col-lg-12">
		<h1 class="page-header"><?= $user->getName() ?> <small><?= $user->getTitle() ?></small>
		</h1>
	</div>

</div>

<div class="row">

	<div class="col-md-8">
		<img class="img-responsive" src="http://placehold.it/750x500">
	</div>

	<div class="col-md-4">
		<h3>Henkilökuvaus</h3>
		<p class="editable" data-type="textarea" data-pk="1" data-url="libs/editable-userpage.php" data-title="Muokkaa henkilökuvausta" data-placement="bottom">
			<?= $user->getDescription() ?>
		</p>

		<h3>Tagit</h3>
		<div id="tagcloud" style="width: 400px; height: 200px;"></div>
	</div>

</div>

<div class="row">

	<div class="col-lg-12">
		<h3 class="page-header">Kuvia</h3>
	</div>

	<div class="col-sm-3 col-xs-6">
		<a href="#">
			<img class="img-responsive portfolio-item" src="http://placehold.it/500x300">
		</a>
	</div>

	<div class="col-sm-3 col-xs-6">
		<a href="#">
			<img class="img-responsive portfolio-item" src="http://placehold.it/500x300">
		</a>
	</div>

	<div class="col-sm-3 col-xs-6">
		<a href="#">
			<img class="img-responsive portfolio-item" src="http://placehold.it/500x300">
		</a>
	</div>

	<div class="col-sm-3 col-xs-6">
		<a href="#">
			<img class="img-responsive portfolio-item" src="http://placehold.it/500x300">
		</a>
	</div>

</div>

<script type="text/javascript">
	$(function() {
		$("#tagcloud").jQCloud([{text: "Ankka", weight: 1},{text: "Mies", weight: 3},{text: "Professori", weight: 4}]);
		<? if($data->edit) echo "$('.editable').editable();"; // $allow_edit ?>
	});
</script>