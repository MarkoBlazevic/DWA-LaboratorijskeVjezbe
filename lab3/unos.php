<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<title>Korisnik</title>

		<link rel="stylesheet" href="stil.css" />
		<link rel="stylesheet" href="grid.css" />
		
	</head>

	<body>
		<header class="row">
			<div class="column column-12 header">
				<h1 class="logo"></h1>
				<div class="korisnik">
				<?php
					$username = $_GET['username'];
					echo '<p>' . $username . '</p>';
				?>
				</div>
			</div>
		</header>
		
		<section class="gray-boxes row">
			<ul class="sidemenu column column-3">
				<li><a href="pacijenti.php">pacijenti</a></li>
				<li><a href="unos.html">unos</a></li>
				<li><a href="#">Meni3</a></li>
			</ul>
			
			<div class="column column-8">
				<?php

	$imePacijent=$_POST['imePacijent'];
	$prezimePacijent=$_POST['prezimePacijent'];
	$spol=$_POST['spol'];
	$datumRodjenja = date("Y-m-d", strtotime($_POST['datumRodjenja']));
	$adresa=$_POST['adresa'];
	$krvnaGrupa=$_POST['krvnaGrupa'];
	$predznak=$_POST['predznak'];
	$ostaleTegobe=$_POST['ostaleTegobe'];
	$tegobe=$_POST['tegobe'];
	$lijekovi=$_POST['lijekovi'];
	$alergija=$_POST['alergija'];
	
	
	$link = mysqli_connect('localhost', 'root', '123', 'DWA');
	if($link) { }
	else {
		echo "Došlo je do pogreške prilikom spajanja!";
		exit();
	}
	$upit = "INSERT INTO unosPacijenata(imePacijent,prezimePacijent,spol,datumRodjenja,adresa,krvnaGrupa,ostaleTegobe,tegobe,lijekovi,alergija) 
	VALUES ('$imePacijent', '$prezimePacijent', '$spol', '$datumRodjenja', '$adresa', '$krvnaGrupa$predznak', '$ostaleTegobe', '$tegobe', '$lijekovi', '$alergija')";
	$result = mysqli_query($link, $upit);
	if($result) { }
	else {
		echo "Došlo je do pogreške pri unosu u bazu!";}
	mysqli_close($link);
	
	
	echo '<p>' . 'Ime pacijenta: ' . $imePacijent . '</p>'; 
	echo '<p>' . 'Prezime pacijenta: ' . $prezimePacijent . '</p>'; 
	echo '<p>' . 'Spol pacijenta: ' . $spol . '</p>'; 
	echo '<p>' . 'Datum rodjenja: ' . $datumRodjenja . '</p>'; 
	echo '<p>' . 'Adresa pacijenta: ' . $adresa . '</p>'; 
	echo '<p>' . 'Krvna grupa: ' . $krvnaGrupa . $predznak . '</p>'; 
	echo '<p>' . 'Prijašnje tegobe: ' . $ostaleTegobe . '</p>'; 
	echo '<p>' . 'Koje su: ' . $tegobe . '</p>'; 
	echo '<p>' . 'Je li osoba alergična na lijekove: ' . $lijekovi . '</p>'; 
	echo '<p>' . 'Na koje je lijekove osoba alergična: ' . $alergija . '</p>'; 
	
	
	?>
			</div>
		
		<a href="unos.html">Nazad</a>
		</section>
		
		<div class="spacer"></div>
	
	<footer class="footer row">
		<p>Copyright ZKD, 2014</p>
	</footer>
	</body>

</html>





















