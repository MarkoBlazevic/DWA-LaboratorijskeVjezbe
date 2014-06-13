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
				<li><a href="trazi_forma2.php">Trazilica pacijenata</a></li>
				<li><a href="doktori.php">Svi doktori</a></li>
				<li><a href="doktori_forma.php">Pretraga doktora</a></li>
				<li><a href="udio_spol.php">Udio muškaraca i žena</a></li>
				<li><a href="udio_krvnaGrupa.php">Udio krvnih grupa</a></li>
			</ul>
			
			<div class="column column-8">
				<form name="trazi" action="javatrazi.php" method="POST">
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
					
					<label for="krvnaGrupa">Krvna grupa(ako zna):</label>
					<br/>
					<select id="krvnaGrupa" name="krvnaGrupa">
						<option name="0+" value="0+">0+</option>
						<option name="A+" value="A+">A+</option>
						<option name="B+" value="B+">B+</option>
						<option name="AB+" value="AB+">AB+</option>
						<option name="0-" value="0-">0-</option>
						<option name="A-" value="A-">A-</option>
						<option name="B-" value="B-">B-</option>
						<option name="AB-" value="AB-">AB-</option>
					</select>
					
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























