<?php

?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Henkilögalleria</title>
	<link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<link href="css/jqcloud.css" rel="stylesheet">
	<link href="css/bootstrap-tagsinput.css" rel="stylesheet">
	<link href="css/bootstrap-editable.css" rel="stylesheet">

	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
	<script src="js/bootstrap.js"></script>
	<script src="js/bootstrap-tagsinput.min.js"></script>
	<script src="js/jqcloud.min.js"></script>
	<script src="js/bootstrap-editable.min.js"></script>
</head>

<body>

<nav class="navbar navbar-fixed-top navbar-inverse" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="index.php">Henkilögalleria</a>
		</div>

		<div class="collapse navbar-collapse navbar-ex1-collapse">
			<ul class="nav navbar-nav">
				<li><a href="list.php">Henkilöt</a>
				</li>
				<li><a href="add.php">Lisää</a>
				</li>
				<li><a href="about.php">Tietoja</a>
				</li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<a class="dropdown-toggle" href="#" data-toggle="dropdown">Kirjautuminen</a>
					<div class="dropdown-menu" style="padding: 15px;">
						<?php if(!isset($_SESSION["tsoha-session"])) { ?>
						<form role="form" style="width: 300px;" action="libs/login.php" method="POST">
							<div class="form-group">
								<label for="exampleInputEmail1">Sähköpostiosoite</label>
								<input type="email" class="form-control" name="login-email" id="login-email" placeholder="aku.ankka@example.com">
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Salasana</label>
								<input type="password" class="form-control" name="login-password" id="login-password" placeholder="Salasana">
							</div>
							<button type="submit" class="btn btn-default" name="login-submit">Kirjaudu</button>
						</form>
						<br>
						<p class="bg-info">Ei tunnusta? Voi voi :)<br><small>protip, luo itsestäsi sivu ja saat tunnukset about automaattisesti!</small></p>
						<?php } else { echo "Tervetuloa<br>Work in progress<br><br><a href='libs/login.php?a=logout'>Kirjaudu ulos</a>"; } ?>
					</div>
				</li>
			</ul>
		</div>
	</div>
</nav>

<div class="container">

	<?php

		if(isset($_SESSION['tsoha-errors'])) {
			foreach($_SESSION['tsoha-errors'] as $i) {
				echo "<div class='bg-info' style='padding: 10px;'>" . $i . "</div>";
			}
			unset($_SESSION['tsoha-errors']);
		}

		if(isset($data->innerContent)) {
			showView($data->innerContent);
		} else {
			echo "Ei?";
		}
	?>

	<hr>

	<footer>
		<div class="row">
			<div class="col-lg-12">
				<p>TSOHA</p>
			</div>
		</div>
	</footer>

</div>
</body>

</html>