<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<title>Korisnik</title>

		<link rel="stylesheet" href="stil.css" />
		<link rel="stylesheet" href="grid.css" />
		<script type=”text/javascript”>
	(function(document) {
	'use strict';

	var LightTableFilter = (function(Arr) {

		var _input;

		function _onInputEvent(e) {
			_input = e.target;
			var tables = document.getElementsByClassName(_input.getAttribute('data-table'));
			Arr.forEach.call(tables, function(table) {
				Arr.forEach.call(table.tBodies, function(tbody) {
					Arr.forEach.call(tbody.rows, _filter);
				});
			});
		}

		function _filter(row) {
			var text = row.textContent.toLowerCase(), val = _input.value.toLowerCase();
			row.style.display = text.indexOf(val) === -1 ? 'none' : 'table-row';
		}

		return {
			init: function() {
				var inputs = document.getElementsByClassName('light-table-filter');
				Arr.forEach.call(inputs, function(input) {
					input.oninput = _onInputEvent;
				});
			}
		};
	})(Array.prototype);

	document.addEventListener('readystatechange', function() {
		if (document.readyState === 'complete') {
			LightTableFilter.init();
		}
	});

})(document);
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
			<input type="search" class="light-table-filter" data-table="table" placeholder="Filter">
			
				<?php
				$link = mysqli_connect('localhost', 'root', 'mysql', 'labos');
				
				$upit = "SELECT imePacijent, prezimePacijent, spol, datumRodjenja, brojMobitela, adresa, mjesto FROM pacijenti;";
				$result = mysqli_query($link, $upit);
				$br = mysqli_num_rows($result);
				
echo <<< EOT
<table class="table" border="1">
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