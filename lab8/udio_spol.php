<?php 
session_start();
if(!isset($_SESSION['korisnik'])) 
{
header('Location: login.html');
}


 
//header('Content-type: image/png');
$con=mysqli_connect('localhost','root','123','DWA');

if(mysqli_connect_errno()){
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
		}
		
mysqli_query($con, "SET NAMES 'utf8'");
mysqli_query($con, "SET CHARACTER_SET 'utf8'");
$query1=mysqli_query($con,"SELECT COUNT(*) as muski from unosPacijenata WHERE spol='M'") ;
$query2= mysqli_query($con,"SELECT COUNT(*) as zenski from unosPacijenata WHERE spol='Ž'") ;
$data1=mysqli_fetch_assoc($query1);
$data2=mysqli_fetch_assoc($query2);

 $total = $data1['muski'] + $data2['zenski']; 
$one = round(360 * $data1['muski'] / $total,2); 
 $two = round(360 * $data2['zenski'] / $total,2); 
 $mpostotak = round($data1['muski'] / $total * 100, 2); 
 $zpostotak = round($data2['zenski'] / $total * 100, 2); 
 $slide = $one + $two; 
 $handle = imagecreate(100, 100); 
 $background = imagecolorallocate($handle, 255, 255, 255); 
 $red = imagecolorallocate($handle, 255, 0, 0); 
 $green = imagecolorallocate($handle, 0, 255, 0); 
 $blue = imagecolorallocate($handle, 0, 0, 255); 
 $darkred = imagecolorallocate($handle, 150, 0, 0); 
 $darkblue = imagecolorallocate($handle, 0, 0, 150); 
 $darkgreen = imagecolorallocate($handle, 0, 150, 0); 

 // 3D look
 for ($i = 60; $i > 50; $i--) 
 { 
 imagefilledarc($handle, 50, $i, 100, 50, 0, $one, $darkred, IMG_ARC_PIE); 
 imagefilledarc($handle, 50, $i, 100, 50, $one, $slide , $darkblue, IMG_ARC_PIE); 

if ($slide = 360)
{
 }
else
{
 imagefilledarc($handle, 50, $i, 100, 50, $slide, 360 , $darkgreen, IMG_ARC_PIE); 
 }
}
 imagefilledarc($handle, 50, 50, 100, 50, 0, $one , $red, IMG_ARC_PIE); 
 imagefilledarc($handle, 50, 50, 100, 50, $one, $slide , $blue, IMG_ARC_PIE); 
 if ($slide = 360)
{
 }
else
{
 imagefilledarc($handle, 50, 50, 100, 50, $slide, 360 , $green, IMG_ARC_PIE); 
}
 //imagepng($handle); 
 imagepng( $handle, "pie_chart.png", 0); 
 //imagedestroy($handle);
 
 
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
				<li><a href="doktori_forma.php">Pretraga doktora</a></li>
				<li><a href="udio_spol.php">Udio muškaraca i žena</a></li>
				<li><a href="udio_krvnaGrupa.php">Udio krvnih grupa</a></li>
			</ul>
			
			<div class="column column-8">
			<?php
			
			echo "<img src='pie_chart.png'><p></p>";
			echo "<font color=0000FF>Muškaraca</font> = ".$mpostotak." %<br>";
			echo "<font color=ff0000>Žena</font> = ".$zpostotak." %<br>";
			?>
			</div>
		
		</section>
		
		<div class="spacer"></div>
	
	<footer class="footer row">
		<p>Copyright ZKD, 2014</p>
	</footer>
	</body>

</html>
			
				
