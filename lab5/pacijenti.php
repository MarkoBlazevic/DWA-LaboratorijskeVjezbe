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
			
			<div class="column column-8" style="top: 50px;">
			<input type="text" id="searchTerm" class="search_box" onkeyup="doSearch()" />
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
				<tr class="tableHover">
					<td>Štefica</td>
					<td>Ostojić</td> 
					<td>Ž</td>
					<td>17.3.1937</td>
					<td>091/7121688</td>
					<td>Redovka 9</td>
					<td>Zagreb</td>
				</tr>
				<tr class="tableHover">					
					<td>Ivan</td>
					<td>Kušan</td> 
					<td>M</td>
					<td>19.7.1979</td>
					<td>098/1667148</td>
					<td>Marinovečka 12</td>
					<td>Zagreb</td>
				</tr>
				<tr class="tableHover">					
					<td>Hrvoje</td>
					<td>Radić</td> 
					<td>M</td>
					<td>6.6.1944</td>
					<td>098/7317883</td>
					<td>Dore Pejačević 28</td>
					<td>Zagreb</td>
				</tr>
				<tr class="tableHover">					
					<td>Vjeran</td>
					<td>Delić</td> 
					<td>M</td>
					<td>2.3.1978</td>
					<td>022/4672651</td>
					<td>Banovski Put 11</td>
					<td>Zagreb</td>
				</tr>
				<tr class="tableHover">					
					<td>Filip</td>
					<td>Pavlović</td> 
					<td>M</td>
					<td>28.3.1939</td>
					<td>092/6058667</td>
					<td>Sitnice 24</td>
					<td>Zagreb</td>
				</tr>
				<tr class="tableHover">					
				<td>Elena</td>
					<td>Mandić</td> 
					<td>Ž</td>
					<td>25.9.1992</td>
					<td>098/6248116</td>
					<td>Rebrovac 23</td>
					<td>Zagreb</td>
				</tr>
				<tr class="tableHover">					
					<td>Dinko</td>
					<td>Kovačević</td> 
					<td>M</td>
					<td>13.11.1940</td>
					<td>021/2727852</td>
					<td>Martinci 28</td>
					<td>Zagreb</td>
				</tr>
				<tr class="tableHover">					
					<td>Vjeran</td>
					<td>Kušec</td> 
					<td>M</td>
					<td>13.3.1978</td>
					<td>01/9155118</td>
					<td>Donadinieva 30</td>
					<td>Zagreb</td>
				</tr>
				<tr class="tableHover">					
					<td>Marina</td>
					<td>Milinović</td> 
					<td>Ž</td>
					<td>12.12.1961</td>
					<td>099/6669101</td>
					<td>Raosa, Ivana 4</td>
					<td>Zagreb</td>
				</tr>
				<tr class="tableHover">					
					<td>Katarina</td>
					<td>Cindrić</td> 
					<td>Ž</td>
					<td>9.7.1991</td>
					<td>022/4547668</td>
					<td>Ratarska 11</td>
					<td>Zagreb</td>
				</tr>
				<tr class="tableHover">					
					<td>Josip</td>
					<td>Bošnjak</td> 
					<td>M</td>
					<td>25.4.1951</td>
					<td>099/2720846</td>
					<td>Andraševečka 8</td>
					<td>Zagreb</td>
				</tr>
				<tr class="tableHover">					
					<td>Ivana</td>
					<td>Mandić</td> 
					<td>Ž</td>
					<td>28.3.1939</td>
					<td>092/6058667</td>
					<td>Sitnice 24</td>
					<td>Zagreb</td>
				</tr>
				<tr class="tableHover">					
					<td>Katarina</td>
					<td>Grgić</td> 
					<td>Ž</td>
					<td>16.5.1943</td>
					<td>098/6539595</td>
					<td>Ravnice 25</td>
					<td>Zagreb</td>
				</tr>
				<tr class="tableHover">					
					<td>Vjeran</td>
					<td>Rukavina</td> 
					<td>M</td>
					<td>27.5.1959</td>
					<td>031/6298645</td>
					<td>Remetinec 11</td>
					<td>Zagreb</td>
				</tr>
				<tr class="tableHover">					
					<td>Štefica</td>
					<td>Radić</td> 
					<td>Ž</td>
					<td>21.3.1955</td>
					<td>021/3197918</td>
					<td>Dragozetićka 2</td>
					<td>Zagreb</td>
				</tr>
				<tr class="tableHover">					
					<td>Mirka</td>
					<td>Špoljarić</td> 
					<td>Ž</td>
					<td>11.6.1957</td>
					<td>031/2887741</td>
					<td>Doneca Ivana 4</td>
					<td>Zagreb</td>
				</tr>
				<tr class="tableHover">					
					<td>Goran</td>
					<td>Milinović</td> 
					<td>M</td>
					<td>4.9.1954</td>
					<td>042/1331138</td>
					<td>Martićeva 12</td>
					<td>Zagreb</td>
				</tr>
				<tr class="tableHover">					
					<td>Lino</td>
					<td>Kučić</td> 
					<td>M</td>
					<td>10.5.1960</td>
					<td>021/4133537</td>
					<td>Ribnjak 27</td>
					<td>Zagreb</td>
				</tr>
				<tr class="tableHover">					
					<td>Kristina</td>
					<td>Novosel</td> 
					<td>Ž</td>
					<td>21.6.1937</td>
					<td>031/5618736</td>
					<td>Sakačeva 31</td>
					<td>Zagreb</td>
				</tr>
				</table>
			
			</div>
		
		
		</section>
		
		<div class="spacer"></div>
	
	<footer class="footer row">
		<p>Copyright ZKD, 2014</p>
	</footer>
	</body>

</html>
