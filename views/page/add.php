<?php
	global $tempdata;
?>
<div class="row">
	<div class="col-lg-12">
		<h1>Lisää henkilö</h1>
		<p>Tämän lomakkeen avulla voit lisätä henkilön Henkilögalleriaan.</p>
		<p>Tietojen lähettämisen jälkeen ne menevät ylläpitäjän hyväksyntää odottamaan.</p>

		<form action="libs/register.php" method="POST" autocomplete="off">
			<div class="form-group">
				<label for="register-name">Nimesi</label>
				<input <? if(isset($tempdata['register-name'])) { echo "value='".$tempdata['register-name']."'"; } ?> type="text" class="form-control" name="register-name" id="register-name" placeholder="Aku ankka" required="" autocomplete="off">
			</div>
			<div class="form-group">
				<label for="register-descr">Kuvaile itseäsi</label>
				<textarea class="form-control" id="register-descr" name="register-descr" placeholder="Asun ankkalinnassa :)" required=""><? if(isset($tempdata['register-descr'])) { echo $tempdata['register-descr']; } ?></textarea>
			</div>
			<div class="form-group">
				<label for="register-tags">Tags!</label>
				<input <? if(isset($tempdata['register-tags'])) { echo "value='".$tempdata['register-tags']."'"; } ?> type="text" value="Helsingin,Yliopisto" data-role="tagsinput" name="register-tags" /> protip: paina enter tagin jälkeen
			</div>
			<hr>
			<h3>Nyt jotain henkilökohtaisempaa... <small>Tunnustasi varten! Ei näy ulkomaailmaan!</small></h3>
			<div class="form-group">
				<label for="register-email">Sähköpostiosoitteesi</label>
				<input <? if(isset($tempdata['register-email'])) { echo "value='".$tempdata['register-email']."'"; } ?> type="email" class="form-control" name="register-email" id="register-email" placeholder="aku.ankka@example.com" required="" autocomplete="off">
			</div>
			<div class="form-group col-xs-6">
				<label for="register-pswd">Salasana</label>
				<input type="password" class="form-control" name="register-pswd" id="register-pswd" placeholder="Tositurvallinensalasana!%&$£@§§" required="" autocomplete="off">
			</div>
			<div class="form-group col-xs-6">
				<label for="register-pswd2">Salasana <small>uudelleen...</small></label>
				<input type="password" class="form-control" name="register-pswd2" id="register-pswd2" placeholder="Tositurvallinensalasana!%&$£@§§" required="" autocomplete="off">
			</div>
			<button type="submit" class="btn btn-primary" name="add-submit">Lisää</button>
		</form>
	</div>
</div>
