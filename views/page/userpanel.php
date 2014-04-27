<div class="row">
	<div class="col-lg-12">
		<h1>Käyttäjän oma hallintapaneeli</h1>

		<h3>Lista kysymyksistä</h3>
		<table class="table table-responsive table-striped">
			<tr>
				<th>Kysymys</th>
				<th>Vastauksesi</th>
			</tr>
			<?php
			foreach ($data->questions as $v) {
				$vastaus = "";
				foreach ($data->answers as $a) {
					if ($a->qid == $v->qid) {
						$vastaus = $a->answ;
						break;
					}
				}
				echo "<tr><td>{$v->question}</td><td><p class='editable' data-type='text' data-name='vastaus' data-pk='{$v->qid}' data-title='Muuta vastaustasi' data-placement='bottom'>{$vastaus}</p></td></tr>";
			}
			?>
		</table>

		<h3>Kuvat</h3>
		<table class="table table-responsive table-striped">
			<tr>
				<th>Kuva</th>
				<th>Default</th>
				<th>Actions</th>
			</tr>
		<?php
		foreach ($data->images as $v) {
			echo "<tr><td>{$v->imgpath}</td><td>", ($v->imgid == Account::getLoggedInAccount()->getPerson()->getDefaultimg()) ? "<span class='glyphicon glyphicon-ok icon-green'></span>" : "<a href='panel.php?defaultimg={$v->imgid}'><span class='glyphicon glyphicon-remove icon-red'></span></a>","</td><td><a class='btn btn-default' href='panel.php?removeimg={$v->imgid}'>Poista</a></td></tr>";
		}
		?>
		</table>
		<h3>Lisää kuva</h3>
		<form action="libs/upload.php" method="post" enctype="multipart/form-data">
			<input type="file" name="file" id="file"><br>
			<input type="submit" name="submit" value="Lähetä">
		</form>

	</div>
</div>

<script type="text/javascript">
	$(function () {
		$('.editable').editable({
			url: 'panel.php',
			inputclass: 'form-control',
			clear: false,
			showbuttons: 'bottom'
		});
	});
</script>