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
			</ul>
			
			<div class="column column-8">
				<form name="unos" action="doktori_trazilica.php" method="GET">
						<!--   Unos imena  -->
					<label for="imeDoktor">Ime doktora:</label>
					<br/>
					<input id="imeDoktor" type="text" name="imeDoktor" placeholder="Ime"/>
					<br/><br/>
					<!--   Unos prezimena  -->
					<label for="prezimeDoktor">Prezime doktora:</label>
					<br/>
					<input id="prezimeDoktor" type="text" name="prezimeDoktor" placeholder="Prezime"/>
					<br/><br/>
					
			
					<input type="submit" value="Traži"/>
</form>
			</div>
		
		
		</section>
		
		
	
	<footer class="footer row">
		<p>Copyright ZKD, 2014</p>
	</footer>
	</body>

</html>






















