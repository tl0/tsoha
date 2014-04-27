<?php
global $user;
?>
<div class="row">

	<div class="col-lg-12">
		<h1 class="page-header"><?= $user->getName() ?>
			<small class="editable" data-type="textarea" data-name="title" data-title="Muokkaa titteliä"
			       data-placement="bottom"><?= $user->getTitle() ?></small>
			<span class="pull-right label label-warning"><? if (!$user->getPublished()) echo "Ei julkaistu!"; ?></span>
		</h1>
	</div>

</div>

<div class="row">

	<div class="col-md-8">
		<? if (Account::getLoggedInAccount()->getPerson()->getDefaultimg() != null) {
			echo "<img class='img-responsive' src='upload/" . Person::getUserByID($user->getId())->getDefaultImgPath() . "' style='max-height: 500px; max-width: 750px;'>";
		} else {
			echo "<img class='img-responsive' src='http://placehold.it/750x500&text=No%20image' style='max-height: 500px; max-width: 750px;'>";

		}
		?>
	</div>

	<div class="col-md-4">
		<h3>Henkilökuvaus</h3>

		<p class="editable" data-type="textarea" data-name="descr" data-title="Muokkaa henkilökuvausta"
		   data-placement="bottom"><?= $user->getDescription() ?></p>

		<h3>Tagit</h3>

		<div id="tagcloud" style="width: 400px; height: 200px;"></div>
	</div>

</div>

<div class="row">

	<div class="col-lg-12">
		<h3 class="page-header">Vastauksia kysymyksiin</h3>
	</div>

	<?php
	foreach ($data->questions as $v) {
		echo "<div class='col-sm-3 col-xs-6'><h3>{$v->question}</h3><blockquote>{$v->answ}</blockquote></div>";
	}
	?>

</div>

<div class="row">

	<div class="col-lg-12">
		<h3 class="page-header">Kuvia</h3>
	</div>

	<?php
	foreach ($data->images as $v) {
		echo "<div class='col-sm-3 col-xs-6'><img class='img-responsive portfolio-item' src='upload/{$v->imgpath}'></div>";
	}
	?>

</div>

<script type="text/javascript">
	$(function () {
		$("#tagcloud").jQCloud([
			<?php
				foreach($data->tagit as $v) {
					echo "{text: '".$v->tagname."', weight: 3},";
				}
 ?>
		]);
		<? if($data->edit) { ?>
		$('.editable').editable({
			pk: <?= $user->getId() ?>,
			url: 'libs/editable-userpage.php',
			inputclass: 'form-control',
			clear: false,
			showbuttons: 'bottom'
		});
		<? } ?>
	});
</script>
