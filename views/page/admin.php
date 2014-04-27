<div class="row">
	<div class="col-lg-12">
		<h1>Ylläpitäjän hallintapaneeli</h1>

		<h3>Lista henkilöistä</h3>
		<table class="table table-responsive table-striped">
			<tr>
				<th>ID</th>
				<th>Nimi</th>
				<th>Julkaistu</th>
				<th>Actions</th>
			</tr>
			<?php
			foreach ($data->users as $v) {
				echo "<tr><td>{$v->userid}</td><td>{$v->name}</td><td>", ($v->published) ? "<span class='glyphicon glyphicon-ok icon-green'></span>" : "<span class='glyphicon glyphicon-remove icon-red'></span>", "</td><td><a class='btn btn-default' href='user.php?id={$v->userid}'>Profiili</a> &bull; <a class='btn btn-default' href='admin.php?id={$v->userid}&action=toggle'>Toggle status</a></td></tr>";
			}
			?></table>

		<h3>Lista kysymyksistä</h3>
		<table class="table table-responsive table-striped">
			<tr>
				<th>ID</th>
				<th>Kysymys</th>
				<th>Actions</th>
			</tr>
			<?php
			foreach ($data->questions as $v) {
				echo "<tr><td>{$v->qid}</td><td>{$v->question}</td><td><a class='btn btn-default' href='admin.php?id={$v->qid}&action=removeq'>Remove</a></td></tr>";
			}
			?>
		</table>
		<div class="col-lg-3">
			<form action="admin.php" method="POST">
				<input type="text" name="kysymys" placeholder="Kysymys tähän" class="form-control">
				<input type="submit" value="Lisää" class="form-control">
			</form>
		</div>
	</div>
</div>
