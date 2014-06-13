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
				<div class="meni">
				<a href="#osobni">Osobni podaci</a>
				<a href="#skola">Podaci o školovanju</a>
				<a href="#rad">Radno iskustvo</a>
				<a href="#znanje">Znanje i vještine</a>
				</div>
			</div>
		</header>
		
		<section class="gray-boxes row">
			<ul class="sidemenu column column-3">
				<li><a href="#">Meni1</a></li>
				<li><a href="#">Meni2</a></li>
				<li><a href="#">Meni3</a></li>
			</ul>
			
			<div class="column column-8" style="top: 50px;">
				<?php
				$link = mysqli_connect('localhost', 'dbuser', '123');
				$link2 = mysqli_select_db('labos', $link);
				
				$upit = "SELECT imePacijent, prezimePacijent, spol, datumRodjenja, brojMobitela, adresa, mjesto FROM pacijent
						LIMIT 0, 5;"
				$result = mysqli_query($link, $upit);
				$br = mysqli_num_rows($result);
				
echo <<< EOT
<table border="1">
<tr>
	<td>Ime</td>
	<td>Prezime</td>
	<td>Spol</td>
	<td>Datum rođenja</td>
	<td>Mobitel</td>
	<td>Adresa</td>
	<td>Mjesto</td>
</tr>
EOT;

for($i=0;$i<$br;$i++) {
	$row=mysql_fetch_array($upit);
	echo <<< EOT
	<tr>
		<td> {$row['imePacijent']} </td>
		<td> {$row['prezimePacijent']} </td>
		<td> {$row['spol']} </td>
		<td> {$row['datumRodjenja']} </td>
		<td> {$row['brojMobitela']} </td>
		<td> {$row['adresa']} </td>
		<td> {$row['mjesto']} </td>
	<tr>
EOT;
}
echo "</table>"
				
				
				?>
			</div>
		
		
		</section>
		
		<div class="spacer"></div>
	
	<footer class="footer row">
		<p>Copyright ZKD, 2014</p>
	</footer>
	</body>

</html>