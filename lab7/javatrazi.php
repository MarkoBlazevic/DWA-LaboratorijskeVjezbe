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
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
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
			
				
				$link=mysqli_connect('localhost','root','123','DWA');
				if(!$link) { 
					echo "Došlo je do pogreške prilikom spajanja!";
					exit();
				}
				
				mysqli_query($link, "SET NAMES 'utf8'");
				mysqli_query($link, "SET CHARACTER_SET 'utf8'");
				
				$where = array();
				foreach(array('imePacijent','prezimePacijent','krvnaGrupa') as $key) {
					if(isset($_POST[$key]) && !empty($_POST[$key])) {
						$where[] = $key . " LIKE '%" . mysqli_real_escape_string($link, $_POST[$key]) . "%'";
					}
				}

				$query = "SELECT * FROM unosPacijenata ";
				if(empty($where)) {
					$query .= "WHERE unos LIKE '%" . mysqli_real_escape_string($info) . "%'";
				} else {
					$query .= "WHERE " . implode(' AND ',$where);
				}
				
				$result=mysqli_query($link, $query);
				
				$arr = array();
				
				while ($row = mysqli_fetch_assoc($result)){
					$arr[] = $row;
				}
				
				?>
				
				
				<p>
					Redni broj: <span id="redniBroj"></span><br />
					Ime: <span id="ime"></span><br />
					Prezime: <span id="prezime"></span><br />
					Krvna grupa: <span id="krvnaGrupa"></span><br />
				</p>
				<input id="prethodni" type="button" value="prethodni"/>
				<input id="sljedeci" type="button" value="sljedeci" />
				<!--onclick="sljedeci();"-->
			</div>
		
		
		</section>
		
		
	
	<footer class="footer row">
		<p>Copyright ZKD, 2014</p>
	</footer>
	</body>
	
	<script>
				var data = <?php  echo json_encode($arr); ?>;
				var i = 0;
				function prikazi() {
					
					document.getElementById('redniBroj').innerHTML = i;
					document.getElementById('ime').innerHTML = data[i].imePacijent;
					document.getElementById('prezime').innerHTML = data[i].prezimePacijent;
					document.getElementById('krvnaGrupa').innerHTML = data[i].krvnaGrupa;
				}
				function prethodni () {
				if (i>0) i=i-1;
					prikazi();
				}
				
				function sljedeci () {
				if (i<data.length) i=i+1;
					prikazi();
				}
				prikazi();
				
				
				
					$("#prethodni").click(function() {
						prethodni();
					});
				

			
					$("#sljedeci").click(function() {
						sljedeci();
					});
				
	</script>
</html>























