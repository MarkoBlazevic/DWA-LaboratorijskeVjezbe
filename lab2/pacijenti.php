<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<title>Korisnik</title>

		<link rel="stylesheet" href="stil.css" />
		<link rel="stylesheet" href="grid.css" />
		<script type=”text/javascript”>
	function doSearch() {
    var searchText = document.getElementById('searchTerm').value;
    var targetTable = document.getElementById('dataTable');
    var targetTableColCount;
            
    //Loop through table rows
    for (var rowIndex = 0; rowIndex < targetTable.rows.length; rowIndex++) {
        var rowData = '';

        //Get column count from header row
        if (rowIndex == 0) {
           targetTableColCount = targetTable.rows.item(rowIndex).cells.length;
           continue; //do not execute further code for header row.
        }
                
        //Process data rows. (rowIndex >= 1)
        for (var colIndex = 0; colIndex < targetTableColCount; colIndex++) {
            rowData += targetTable.rows.item(rowIndex).cells.item(colIndex).textContent;
        }

        //If search term is not found in row data
        //then hide the row, else show
        if (rowData.indexOf(searchText) == -1)
            targetTable.rows.item(rowIndex).style.display = 'none';
        else
            targetTable.rows.item(rowIndex).style.display = 'table-row';
    }
}
			</script>
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
			</div>
		</header>
		
		<section class="gray-boxes row">
			<ul class="sidemenu column column-3">
				<li><a href="pacijenti.php">pacijenti</a></li>
				<li><a href="unos.html">unos</a></li>
				<li><a href="#">Meni3</a></li>
			</ul>
			
			<div class="column column-8" style="top: 50px;">
			<input type="text" id="searchTerm" class="search_box" onkeyup="doSearch()" />
			
				<?php
				$link = mysqli_connect('localhost', 'root', 'mysql', 'labos');
				
				$upit = "SELECT imePacijent, prezimePacijent, spol, datumRodjenja, brojMobitela, adresa, mjesto FROM pacijenti;";
				$result = mysqli_query($link, $upit);
				$br = mysqli_num_rows($result);
				
echo <<< EOT
<table id="dataTable" border="1">
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
	$row=mysqli_fetch_array($result);
echo <<< EOT
	<tr class="tableHover">
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