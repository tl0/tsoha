<div class="jumbotron hero-spacer">
	<h1>Henkilögalleria</h1>
	<p>Yliopiston 375 vuosijuhlintaan liittyen on kaavailtu henkilögalleria, jonne yliopiston piirissä toimivat henkilöt voisivat laittaa itseensä ja toimintaansa liittyvää esittelymateriaalia. Ajatuksena on, että tarjolla on käyttöliittymä, jonka kautta henkilöt voivat toimittaa tietojaan ohjelmassa julkaistavaksi. Tietoja kerätään lomakkeella, johon järjestelmän hoitaja voi määritellä kysymykset. Kyselylomakkeen muotoa ei ole kiinnitetty. Se voi olla näytettävän esittelysivun kaltainen ja muuttua tehtävien valintojen perusteella. Lomakkeen ei kuitenkaan tarvitse olla sellainen. Tietojen syöttäjän pitäisi kuitenkin saada näkyville tuotettu esittelysivu ennen sen julkaisemista. Esittelysivun tietoja pitää pystyä muuttamaan. Järjestelmän hoitajalla tulee olla mahdollisuus muokata lomakkeella esitettäviä kysymyksiä ja lisätä sekä poistaa niitä. Kysymyksiä pitää voida muokata. Henkilöitä voidaan luokitella erilaisten tagien avulla. Henkilöön voi liittyä useita tageja. Tagit voivat vaikuttaa henkilön esittelysivun ulkoasuun esimerkiksi väreihin.<br><br>Gallerian tiedot näytetään vakioidussa muodossa (css:llä säädettävissä). Lähtökohtana on kuvavalikko, jonka sisältö määräytyy valittujen tagien perusteella. Kuvavalikosta pääsee henkilön esittelysivulle. Prototyypissä esittelysivut tuotetaan dynaamisesti. Järjestelmän hoitajalla on oma katselusivu, jonka kautta hän voi tarkastella paitsi esittelysivuja myös niihin liittyvää metatietoa kuten laatimisaikaa tai muutostietoja. Järjestelmän hoitaja antaa esittelysivulle julkaisuluvan.</p>
	<p><a class="btn btn-primary btn-large">Lisää itsesi</a>
	</p>
</div>

<hr>

<div class="row">
	<div class="col-lg-12">
		<h3>Satunnaisia henkilöitä</h3>
	</div>
</div>

<div class="row text-center">

	<?php
		showView("userdetailbox");
	?>

</div>