<!DOCTYPE html>
<html lang="es">
<head>
	<title>Cerrar Sesión</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="w3.css" />
</head>

<body>
	<br><br><br><br><br><br><br><br>
	<div class="w3-container w3-row w3-center">
		<label class="w3-xlarge">IP: <?php echo $_SERVER["REMOTE_ADDR"];?></label>
		<br><br>
		<input class="w3-btn w3-red w3-xlarge" type="button" value="Cerrar Sesión" onclick="check()">
		<br><br>
		<a class="w3-btn w3-green w3-medium" target="_blank" href="https://secure.etecsa.net:8443/">Conectarse</a> |
		<a class="w3-btn w3-orange w3-medium" target="_blank" href="https://www.portal.nauta.cu/">Portal Nauta</a>
		<br><br>
		<h1 id="demo"/>
		<h1 id="response"/>
	</div>

<script type="text/javascript">

	function check() {
		var xhttp = new XMLHttpRequest();
		xhttp.onreadystatechange = function() {
			if (xhttp.readyState == 4 && xhttp.status == 200) {
			
				//if (xhttp.responseText == "Sesión cerrada") {
				//	document.getElementById("demo").innerHTML = xhttp.responseText;
				console.log("Sesión cerrada");
				//}
			}
		};
		xhttp.open("GET", "./libs/logout.php", true);
		xhttp.send();
	}
</script>
</body>
</html>
