<div class="row">
	<div class="col-lg-12">
		<h1>Ylläpitäjän hallintapaneeli</h1>

		<h3>Lista henkilöistä</h3>
		<table class="table table-responsive">
			<tr>
				<th>ID</th>
				<th>Nimi</th>
				<th>Julkaistu</th>
				<th>Actions</th>
			</tr>
		<?php
		foreach($data->users as $v) {
			echo "<tr><td>{$v->userid}</td><td>{$v->name}</td><td>",($v->published) ? "<span class='glyphicon glyphicon-ok icon-green'></span>" : "<span class='glyphicon glyphicon-remove icon-red'></span>","</td><td><a class='btn btn-default' href='user.php?id={$v->userid}'>Profiili</a> &bull; <a class='btn btn-default' href='admin.php?id={$v->userid}&action=toggle'>Toggle status</a></td></tr>";
		}
		?></table>
	</div>
</div>
