<?php
require('skripte/tfpdf/tfpdf.php');

	$imePacijent=$_POST['imePacijent'];
	$prezimePacijent=$_POST['prezimePacijent'];
	$krvnaGrupa=$_POST['krvnaGrupa'] . $_POST['predznak'];
	
$link=mysqli_connect('localhost','root','123','DWA');
if(mysqli_connect_errno()){
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
		}

		
$pdf = new tFPDF();
$pdf->Open();
$pdf->SetAutoPageBreak(false);
$pdf->AddPage();
$pdf->AddFont('Arial','','arialbd.ttf',true);

$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,10,'Popis pacijenata');
$pdf->SetFont('Arial','',7);
$y_axis = 25;

$pdf->SetFillColor(232, 232, 232);
$pdf->SetY($y_axis);
$pdf->SetX(5);

$pdf->Cell(15, 6, 'Ime', 1, 0, 'L', 1);
$pdf->Cell(15, 6, 'Prezime', 1, 0, 'L', 1);
$pdf->Cell(8, 6, 'Spol', 1, 0, 'L', 1);
$pdf->Cell(20, 6, 'Datum Rođenja', 1, 0, 'L', 1);
$pdf->Cell(40, 6, 'Adresa Stanovanja', 1, 0, 'L', 1);
$pdf->Cell(16, 6, 'Krvna Grupa', 1, 0, 'L', 1);
$pdf->Cell(10, 6, 'Tegobe', 1, 0, 'L', 1);
$pdf->Cell(20, 6, 'Tegobe', 1, 0, 'L', 1);
$pdf->Cell(10, 6, 'Alergija', 1, 0, 'L', 1);
$pdf->Cell(20, 6, 'Alergija', 1, 0, 'L', 1);

$where = array();
foreach(array('ime','prezime','krvnaGrupa') as $key) {
    if(isset($_POST[$key]) && !empty($_POST[$key])) {
        $where[] = $key . " LIKE '%" . mysqli_real_escape_string($link, $_POST[$key]) . "%'";
    }
}

mysqli_query($link, "SET NAMES 'utf8'");
mysqli_query($link, "SET CHARACTER_SET 'utf8'");
$query = "SELECT * FROM unosPacijenata ";
if(empty($where)) {
    $query .= "WHERE unos LIKE '%" . mysql_real_escape_string($info) . "%'";
} else {
    $query .= "WHERE " . implode(' AND ',$where);
}

	$result=mysqli_query($link, $query);




$i = 0;
$max = 25;
$row_height = 6;
$y_axis = $y_axis + $row_height;

while($row = mysqli_fetch_array($result))
{
    //If the current row is the last one, create new page and print column title
    if ($i == $max)
    {
        $pdf->AddPage();

        //print column titles for the current page
        $pdf->SetY($y_axis_initial);
        $pdf->SetX(5);
        $pdf->Cell(15);
		$pdf->Cell(15, 6, 'Prezime', 1, 0, 'L', 1);
		$pdf->Cell(8, 6, 'Spol', 1,  0,'L', 1);
		$pdf->Cell(20, 6, 'Datum Rođenja', 1, 0, 'L', 1);
		$pdf->Cell(20, 6, 'Mjesto Rođenja', 1, 0, 'L', 1);
		$pdf->Cell(40, 6, 'Adresa Stanovanja', 1, 0, 'L', 1);
		$pdf->Cell(16, 6, 'Krvna Grupa', 1, 0, 'L', 1);
		$pdf->Cell(10, 6, 'Tegobe', 1, 0, 'L', 1);
		$pdf->Cell(20, 6, 'Tegobe', 1, 0, 'L', 1);
		$pdf->Cell(10, 6, 'Alergija', 1, 0, 'L', 1);
		$pdf->Cell(20, 6, 'Alergija', 1, 0, 'L', 1);

        
        //Go to next row
        $y_axis = $y_axis + $row_height;
        
        //Set $i variable to 0 (first row)
        $i = 0;
    }
	$ime = $row['imePacijent'];
    $prezime = $row['prezimePacijent'];
	$spol = $row['spol'];
	$datum_rodjenja = $row['datumRodjenja'];
	$adresa_stanovanja = $row['adresa'];
	$krvna_grupa = $row['krvnaGrupa'];
	$prijasnje_tegobe = $row['ostaleTegobe'];
	$tegobe = $row['tegobe'];
	$alergija_lijekovi = $row['lijekovi'];
	$alergija = $row['alergija'];

    $pdf->SetY($y_axis);
    $pdf->SetX(5);
    $pdf->Cell(15, 6, $ime, 1, 0,'L', 1);
    $pdf->Cell(15, 6, $prezime, 1, 0, 'L', 1);
    $pdf->Cell(8, 6, $spol, 1, 0, 'L', 1);
	$pdf->Cell(20, 6, $datum_rodjenja, 1, 0, 'L', 1);
	$pdf->Cell(40, 6, $adresa_stanovanja, 1, 0, 'L', 1);
	$pdf->Cell(16, 6, $krvna_grupa, 1, 0, 'L', 1);
	$pdf->Cell(10, 6, $prijasnje_tegobe, 1, 0, 'L', 1);
	$pdf->Cell(20, 6, $tegobe, 1, 0, 'L', 1);
	$pdf->Cell(10, 6, $alergija_lijekovi, 1, 0, 'L', 1);
	$pdf->Cell(20, 6, $alergija, 1, 0, 'L', 1);
	

    //Go to next row
    $y_axis = $y_axis + $row_height;
    $i = $i + 1;
}

$pdf->Output('I','I');

?>