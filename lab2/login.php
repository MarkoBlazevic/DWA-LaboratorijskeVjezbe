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
				<li><a href="pacijenti.php">pacijenti</a></li>
				<li><a href="unos.html">unos</a></li>
				<li><a href="#">Meni3</a></li>
			</ul>
			
			<div class="column column-8" style="top: 50px;">
				<div class="column column-8 zivo">
				<a id="osobni"></a>
				<h3>Osobni podaci</h3>
				<p>Ime i prezime: Marko Blažević</p>
				<p>Mjesto i datum rođenja: Zagreb, 1991.</p>
				</div>
				
				<div class="column column-8 zivo">
				<a id="skola"></a>
				<h3>Podaci o školovanju</h3>
				<p>Osnovna škola: OŠ dr. Ante Starčevića</p>
				<p>Srednja škola: Tehnička škola Ruđera Boškovića u Zagrebu</p>
				<p>Fakultet: TVZ - Tehničko veleučilište u Zagrebu</p>
				</div>
				
				<div class="column column-8 zivo">
				<a id="rad"></a>
				<h3>Radno iskustvo</h3>
				<p>- odrađena stručna praksa za vrijeme srednjoškolskog obrazovanja (Ina,  tehnički servis)<br/>
				- inventura u Kauflandu<br/>
				- promocija Toshiba televizora</p>
				</div>
				
				<div class="column column-8 zivo">
				<a id="znanje"></a>
				<h3>Znanje i vještine</h3>
				<p>HTML5, CSS3</p>
				
				</div>
			</div>
		
		
		</section>
		
		<div class="spacer"></div>
	
	<footer class="footer row">
		<p>Copyright ZKD, 2014</p>
	</footer>
	</body>

</html>