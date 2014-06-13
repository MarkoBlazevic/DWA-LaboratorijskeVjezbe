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
			 <?php

				$ime = $_GET['imeDoktor'];
				$prezime = $_GET['prezimeDoktor'];
				
				$ime = strtoupper($ime);
				$prezime = strtoupper($prezime);
			 
				$json = file_get_contents("http://stajp.vtszg.hr/~spredanic/DWA2/lab5/podaci.php");
				$obj = json_decode($json);
				
				foreach ($obj as $key => $value) { 
					
					/*if(($value->prezime == $prezime) && ($value->ime == $ime){
						echo 'ID: '.$value->id .'<br>';
						echo 'Područni ured: '.$value->podrucni_ured .'<br>';
						echo 'Šifra ustanove: '.$value->sifra_ustanove .'<br>';
						echo 'Naziv ustanove: '.$value->naziv_ustanove .'<br>';
						echo 'ID broj: '.$value->id_broj .'<br>';
						echo 'Prezime: '.$value->prezime .'<br>';
						echo 'Ime: '.$value->ime .'<br>';
						echo 'Broj osiguranika: '.$value->broj_osiguranika .'<br>';
						echo 'Broj pošte: '.$value->broj_poste .'<br>';
						echo 'Naziv pošte: '.$value->naziv_poste .'<br>';
						echo 'Ulica: '.$value->ulica .'<br>';
						echo 'Kućni broj: '.$value->kucni_broj .'<br>';
						echo 'Grad: '.$value->grad .'<br>';
						echo '-------------------------------------------------------'.'<br>';
					} */
				

				//if(isset($_GET['ime'])){
					if($value->ime == $ime){
						echo 'ID: '.$value->id .'<br>';
						echo 'Područni ured: '.$value->podrucni_ured .'<br>';
						echo 'Šifra ustanove: '.$value->sifra_ustanove .'<br>';
						echo 'Naziv ustanove: '.$value->naziv_ustanove .'<br>';
						echo 'ID broj: '.$value->id_broj .'<br>';
						echo 'Prezime: '.$value->prezime .'<br>';
						echo 'Ime: '.$value->ime .'<br>';
						echo 'Broj osiguranika: '.$value->broj_osiguranika .'<br>';
						echo 'Broj pošte: '.$value->broj_poste .'<br>';
						echo 'Naziv pošte: '.$value->naziv_poste .'<br>';
						echo 'Ulica: '.$value->ulica .'<br>';
						echo 'Kućni broj: '.$value->kucni_broj .'<br>';
						echo 'Grad: '.$value->grad .'<br>';
						echo '-------------------------------------------------------'.'<br>';
					}
				//}
				
				//else if(isset($_GET['prezime'])){
					if($value->prezime == $prezime){
						echo 'ID: '.$value->id .'<br>';
						echo 'Područni ured: '.$value->podrucni_ured .'<br>';
						echo 'Šifra ustanove: '.$value->sifra_ustanove .'<br>';
						echo 'Naziv ustanove: '.$value->naziv_ustanove .'<br>';
						echo 'ID broj: '.$value->id_broj .'<br>';
						echo 'Prezime: '.$value->prezime .'<br>';
						echo 'Ime: '.$value->ime .'<br>';
						echo 'Broj osiguranika: '.$value->broj_osiguranika .'<br>';
						echo 'Broj pošte: '.$value->broj_poste .'<br>';
						echo 'Naziv pošte: '.$value->naziv_poste .'<br>';
						echo 'Ulica: '.$value->ulica .'<br>';
						echo 'Kućni broj: '.$value->kucni_broj .'<br>';
						echo 'Grad: '.$value->grad .'<br>';
						echo '-------------------------------------------------------'.'<br>';
					}
				//}
				
				//else if((isset($ime)) && (isset($prezime))){
					if(($value->prezime == $prezime) && ($value->ime == $ime)){
						echo 'ID: '.$value->id .'<br>';
						echo 'Područni ured: '.$value->podrucni_ured .'<br>';
						echo 'Šifra ustanove: '.$value->sifra_ustanove .'<br>';
						echo 'Naziv ustanove: '.$value->naziv_ustanove .'<br>';
						echo 'ID broj: '.$value->id_broj .'<br>';
						echo 'Prezime: '.$value->prezime .'<br>';
						echo 'Ime: '.$value->ime .'<br>';
						echo 'Broj osiguranika: '.$value->broj_osiguranika .'<br>';
						echo 'Broj pošte: '.$value->broj_poste .'<br>';
						echo 'Naziv pošte: '.$value->naziv_poste .'<br>';
						echo 'Ulica: '.$value->ulica .'<br>';
						echo 'Kućni broj: '.$value->kucni_broj .'<br>';
						echo 'Grad: '.$value->grad .'<br>';
						echo '-------------------------------------------------------'.'<br>';
					}
				//}
				}
			?> 
			</div>
		
		
		</section>
		
		
	
	<footer class="footer row">
		<p>Copyright ZKD, 2014</p>
	</footer>
	</body>

</html>























