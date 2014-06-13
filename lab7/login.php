<?php
	session_start();
	
		$username = $_POST['username'];
		$password = $_POST['password'];
						
		$username = stripslashes($username);
		$password = stripslashes($password);
						
		$link = mysqli_connect('localhost', 'root', '123', 'DWA');
		if(!$link) {
			echo 'Došlo je do pogreške pri spajanju na bazu!';
			exit();
		}
		mysqli_query($link, "SET NAMES 'utf8'");
		mysqli_query($link, "SET CHARACTER_SET 'utf8'");
		$upit = "SELECT korisnickoIme, lozinka FROM korisnickiPodaci WHERE korisnickoIme = '$username' AND lozinka = '$password'";
		$result = mysqli_query($link, $upit);
		$provjera = mysqli_num_rows($result);
		
					
	
					

if($provjera==1){
	$_SESSION['korisnik'] = $username;
	echo <<< EOT
						
	<!DOCTYPE html>
	<html>
		<head>
			<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
			<title>Korisnik</title>

			<link rel="stylesheet" href="stil.css" />
			<link rel="stylesheet" href="grid.css" />
			
			<script type="text/javascript">
	  function unhide(divID) {
		var item = document.getElementById(divID);
		if (item) {
		  item.className=(item.className=='hidden')?'unhidden':'hidden';
		}
	  }
	  
	  function hide(divID) {
		var e = document.getElementById(divID);
		e.style.zIndex = -9999;
				e.style.visibility = 'hidden';
	  }
			</script>
			
		</head>

		<body>
			<header class="row">
				<div class="column column-12 header">
					<h1 class="logo"></h1>
					<div class="korisnik">
EOT;
					
						echo '<p>' . $_SESSION['korisnik'] . '</p>';
echo <<< EOT
					
					</div>
					<div class="meni">
					<a href="#osobni">Osobni podaci</a>
					<a href="#skola">Podaci o školovanju</a>
					<a href="#rad">Radno iskustvo</a>
					<a href="#znanje">Znanje i vještine</a>
					</div>
				</div>
			</header>
			
			
			<div id="reklama" style="z-index:999; background-image: url(images/encian.jpg);" >
			<button type="button"  onclick="hide('reklama')">X</button>
			</div>
			
			<section class="gray-boxes row">
				<ul class="sidemenu column column-3">
					<li><a href="pacijenti.php">Pacijenti</a></li>
					<li><a href="unos_forma.php">Unos</a></li>
					<li><a href="login.php">Životopis</a></li>
					<li><a href="trazi_forma.php">Tražilica u PDF</a></li>
				</ul>
				
				<div class="column column-8" style="top: 50px;">
					<div class="column column-8 zivo">
					<p onmouseover="unhide('osobniP')">Osobni podaci</p>
					<div id="osobniP" class="hidden"">
					<a id="osobni"></a>
					<p>Ime i prezime: Marko Blažević</p>
					<p>Mjesto i datum rođenja: Zagreb, 1991.</p>
					</div>
					</div>
					
					<div class="column column-8 zivo">
					<p onmouseover="unhide('skolaP')";>Podaci o školovanju</p>
					<div id="skolaP" class="hidden">
					<a id="skola"></a>
					<p>Osnovna škola: OŠ dr. Ante Starčevića</p>
					<p>Srednja škola: Tehnička škola Ruđera Boškovića u Zagrebu</p>
					<p>Fakultet: TVZ - Tehničko veleučilište u Zagrebu</p>
					</div>
					</div>
					
					<div class="column column-8 zivo">
					<p onmouseover="unhide('iskustvoR')";>Radno iskustvo</p>
					<div id="iskustvoR" class="hidden">
					<a id="rad"></a>
					<p>- odrađena stručna praksa za vrijeme srednjoškolskog obrazovanja (Ina,  tehnički servis)<br/>
					- inventura u Kauflandu<br/>
					- promocija Toshiba televizora</p>
					</div>
					</div>
					
					<div class="column column-8 zivo">
					<p onmouseover="unhide('znanjeV')">Znanje i vještine</p>
					<div id="znanjeV" class="hidden">
					<a id="znanje"></a>
					<p>HTML5, CSS3</p>
					</div>
					
					</div>
				</div>
			
			
			</section>
			
			<div class="spacer"></div>
		
		<footer class="footer row">
			<p>Copyright ZKD, 2014</p>
		</footer>
		</body>

	</html>
EOT;
}
else {
		header('Location: login.html');
	}
?>