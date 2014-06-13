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
			
				<table class="table" border="1">
				<thead>
					<tr>
						<td>Ime</td>
						<td>Prezime</td>
						<td>Spol</td>
						<td>Datum rođenja</td>
						<td>Mobitel</td>
						<td>Adresa</td>
						<td>Mjesto</td>
					</tr>
				</thead>
				<tbody>
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
				</tbody>
				</table>
			</div>
		
		
		</section>
		
		<div class="spacer"></div>
	
	<footer class="footer row">
		<p>Copyright ZKD, 2014</p>
	</footer>
	</body>

</html>