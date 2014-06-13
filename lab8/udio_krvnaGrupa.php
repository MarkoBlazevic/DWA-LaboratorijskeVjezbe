<?php 
session_start();
if(!isset($_SESSION['korisnik'])) 
{
header('Location: login.html');
}


$con=mysqli_connect('localhost','root','123','DWA');

if(mysqli_connect_errno()){
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
		}
mysqli_query($con, "SET NAMES 'utf8'");
mysqli_query($con, "SET CHARACTER_SET 'utf8'");
$query1=mysqli_query($con,"SELECT COUNT(*) as aPoz from unosPacijenata WHERE krvnaGrupa='A+'") ;
$query2= mysqli_query($con,"SELECT COUNT(*) as aNeg from unosPacijenata WHERE krvnaGrupa='A-'") ;
$query3= mysqli_query($con,"SELECT COUNT(*) as bPoz from unosPacijenata WHERE krvnaGrupa='B+'") ;
$query4= mysqli_query($con,"SELECT COUNT(*) as bNeg from unosPacijenata WHERE krvnaGrupa='B-'") ;
$query5= mysqli_query($con,"SELECT COUNT(*) as abPoz from unosPacijenata WHERE krvnaGrupa='AB+'") ;
$query6= mysqli_query($con,"SELECT COUNT(*) as abNeg from unosPacijenata WHERE krvnaGrupa='AB-'") ;
$query7= mysqli_query($con,"SELECT COUNT(*) as nulPoz from unosPacijenata WHERE krvnaGrupa='0+'") ;
$query8= mysqli_query($con,"SELECT COUNT(*) as nulNeg from unosPacijenata WHERE krvnaGrupa='0-'") ;
$data1=mysqli_fetch_assoc($query1);
$data2=mysqli_fetch_assoc($query2);
$data3=mysqli_fetch_assoc($query3);
$data4=mysqli_fetch_assoc($query4);
$data5=mysqli_fetch_assoc($query5);
$data6=mysqli_fetch_assoc($query6);
$data7=mysqli_fetch_assoc($query7);
$data8=mysqli_fetch_assoc($query8);
$aPoz= $data1['aPoz'];
$aNeg=$data2['aNeg'];
$bPoz= $data3['bPoz'];
$bNeg=$data4['bNeg'];
$abPoz= $data5['abPoz'];
$abNeg=$data6['abNeg'];
$nulPoz= $data7['nulPoz'];
$nulNeg=$data8['nulNeg'];
        // read the post data 
        $data = array("$aPoz", "$aNeg", "$bPoz", "$bNeg", "$abPoz", "$abNeg", "$nulNeg", "$aNeg"); 
        $x_fld = array('A+','A-','B+','B-','AB+','AB-','0+','0-'); 
        $max = 0; 
        for ($i=0;$i<8;$i++){ 
          if ($data[$i] > $max)$max=$data[$i];  // find the largest data 
        } 
        $im = imagecreate(400,255); // width , height px 

        $white = imagecolorallocate($im,255,255,255); // allocate some color from RGB components remeber Physics 
        $black = imagecolorallocate($im,0,0,0);   // 
        $red = imagecolorallocate($im,255,0,0);   // 
        $green = imagecolorallocate($im,0,255,0); // 
        $blue = imagecolorallocate($im,0,0,255);  // 
        // 
        // create background box 
        //imagerectangle($im, 1, 1, 319, 239, $black); 
        //draw X, Y Co-Ordinate 
        imageline($im, 10, 5, 10, 230, $blue ); 
        imageline($im, 10, 230, 300, 230, $blue ); 
        //Print X, Y 
        imagestring($im,3,15,5,"Broj bolesnika",$black); 
        imagestring($im,3,320,240,"Krvne grupe",$black); 
		 
     

        // what next draw the bars 
        $x = 15;    // bar x1 position 
        $y = 230;    // bar $y1 position 
        $x_width = 20;  // width of bars 
        $y_ht = 0; // height of bars, will be calculated later 
        // get into some meat now, cheese for vegetarians; 
        for ($i=0;$i<8;$i++){ 
          $y_ht = ($data[$i]/$max)* 100;    // no validation so check if $max = 0 later; 
          imagerectangle($im,$x,$y,$x+$x_width,($y-$y_ht),$red); 
          imagestring( $im,2,$x-1,$y+1,$x_fld[$i],$black); 
          imagestring( $im,2,$x-1,$y+10,$data[$i],$black); 
          $x += ($x_width+20);   // 20 is diff between two bars; 
          
        } 
        imagepng( $im, "bar_chart.png", 0); 
        imagedestroy($im); 
        //echo "<img src='bar_chart.jpeg'><p></p>"; 
  
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
			echo "<img src='bar_chart.png'><p></p>"
 
			?>
				
			</div>
		
		</section>
		
		<div class="spacer"></div>
	
	<footer class="footer row">
		<p>Copyright ZKD, 2014</p>
	</footer>
	</body>

</html>
