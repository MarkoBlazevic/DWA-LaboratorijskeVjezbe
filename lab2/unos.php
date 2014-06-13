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
	$datumRodjenja=$_POST['datumRodjenja'];
	$brojMobitela=$_POST['brojMobitela'];
	$adresa=$_POST['adresa'];
	$mjesto=$_POST['mjesto'];
	

	$link = mysqli_connect('localhost', 'root', 'mysql', 'labos');
	if($link) {
		echo "Spojeni ste na bazu!";
	}
	else {
		echo "Došlo je do pogreške prilikom spajanja!";
		exit();
	}
	$upit = "INSERT INTO pacijenti(imePacijent,prezimePacijent,spol,datumRodjenja,brojMobitela,adresa,mjesto) VALUES ('$imePacijent', '$prezimePacijent', '$spol', '$datumRodjenja', '$brojMobitela', '$adresa', '$mjesto')";
	$result = mysqli_query($link, $upit);
	if($result) {
		echo "Podaci uspješno uneseni!";
	}
	else {
		echo "Došlo je do pogreške pri unosu u bazu!";}
	mysqli_close($link);
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





















