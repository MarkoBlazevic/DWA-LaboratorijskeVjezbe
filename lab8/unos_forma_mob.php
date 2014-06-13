<?php
session_start();

if(!isset($_SESSION['korisnik'])) 
{
header('Location: login.html');
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<title>Korisnik</title>

		<link rel="stylesheet" href="stil.css" />
		<link rel="stylesheet" href="grid.css" />
		<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.css" />
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.js"></script>
		
	</head>

	<body>
		<header class="row">
			<div class="column column-12 header">
				<h1 class="logo"></h1>
				<div class="korisnik">
<?php
				
					echo '<p>' . $_SESSION['korisnik'] . '</p>';
?>
					<form action="ubi_sesiju.php" method="post">
					<input type="submit" value="Odjavi"/>
					</form>		
				</div>
			</div>
		</header>
		
		<section class="gray-boxes row">
			<ul class="sidemenu column column-3">
				<li><a href="pacijenti.php">Pacijenti</a></li>
				<li><a href="unos_forma.php">Unos</a></li>
				<li><a href="login.php">Zivotopis</a></li>
				<li><a href="trazi_forma.php">Tražilica u PDF</a></li>
				<li><a href="trazi_forma2.php">Trazilica pacijenata</a></li>
				<li><a href="doktori.php">Svi doktori</a></li>
				<li><a href="doktori_forma.php">Pretraga doktora</a></li>
				<li><a href="udio_spol.php">Udio muškaraca i žena</a></li>
				<li><a href="udio_krvnaGrupa.php">Udio krvnih grupa</a></li>
			</ul>
			
			<div class="column column-8">
				<form name="unos" action="unos.php" method="POST">
						<!--   Unos imena  -->
					<label for="imePacijent">Ime pacijenta:</label>
					<br/>
					<input id="imePacijent" type="text" name="imePacijent"/>
					<br/><br/>
					<!--   Unos prezimena  -->
					<label for="prezimePacijent">Prezime pacijenta:</label>
					<br/>
					<input id="prezimePacijent" type="text" name="prezimePacijent"/>
					<br/><br/>
					<!--   Odabir spola  -->
					<label for="spol">Spol pacijenta:</label>
					<br/>
					<input type="radio" name="spol" value="M">M</input>
					<br/>
					<input type="radio" name="spol" value="Ž">Ž</input>
					<br/><br/>
					<!--   Datum rođenja  -->
					<label for="datumRodjenja">Datum rođenja:</label>
					<br/>
					<input type="date" name="datum_rodjenja"><br>
					<br/><br/>
					<!--   Unos adrese  -->
					<label for="adresa">Adresa i mjesto stanovanja:</label>
					<br/>
					<input id="adresa" type="text" name="adresa"/>
					<br/><br/>
					<!--   Odabir krvne grupe	-->
					<label for="krvnaGrupa">Krvna grupa(ako zna):</label>
					<br/>
					<select id="krvnaGrupa" name="krvnaGrupa">
						<option name="0" value="0">0</option>
						<option name="A" value="A">A</option>
						<option name="B" value="B">B</option>
						<option name="AB" value="AB">AB</option>
					</select>
					<select id="predznak" name="predznak">
						<option name="-" value="-">-</option>
						<option name="+" value="+">+</option>
					</select>
					<br/><br/>
					<label for="ostaleTegobe">Ima li prijašnjih medicinskih tegoba (srčane tegobe, tlak, virusne bolesti (Hepatits, HIV)):</label>
					<br/>
					<input type="radio" name="ostaleTegobe" value="da">Da</input>
					<br/>
					<input type="radio" name="ostaleTegobe" value="ne">Ne</input>
					<br/><br/>
					<label for="tegobe">Ako je odgovor na prijašnje pitanje "Da" popuniti:</label>
					<br/>
					<label for="tegobe">Koje tegobe osoba ima:</label>
					<br/>
					<textarea name="tegobe" rows=8 cols=50></textarea>
					<br/><br/>
					<label for="lijekovi">Je li osoba alergična na lijekove:</label>
					<br/>
					<input type="radio" name="lijekovi" value="da">Da</input>
					<br/>
					<input type="radio" name="lijekovi" value="ne">Ne</input>
					<br/>
					<input type="radio" name="lijekovi" value="nezna">Ne zna</input>
					<br/><br/>
					<label for="alergija">Ako je odgovor na prijašnje pitanje "Da" popuniti:</label>
					<br/>
					<label for="alergija">Na koje lijekove je osoba alergična:</label>
					<br/>
					<textarea name="alergija" rows=8 cols=50></textarea>
					<br/><br/>
					
			
					<input type="submit" value="Unesi"/>
</form>
			</div>
		
		
		</section>
		
		
	
	<footer class="footer row">
		<p>Copyright ZKD, 2014</p>
	</footer>
	</body>

</html>






















