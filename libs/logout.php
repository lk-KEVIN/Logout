<?php
require('./routeros_api.class.php');

$API = new RouterosAPI();
//$API->debug = true;
//$API->response = true;

// Obtener el IP de quien visite la página
$target = $_SERVER["REMOTE_ADDR"];

$servname = "127.0.0.1";
$username = "admin";
$password = "admin";

if ($API->connect($servname, $username, $password)) {

	// Crear un array de todas las direcciones IP
  // Create an array of every IP address
	// https://forum.mikrotik.com/viewtopic.php?t=43718#p863724

	$API->write("/ip/firewall/address-list/getall",false);
	$API->write('?address='.$target,true);
	$READ = $API->read(false);
	$ARRAY = $API->parseResponse($READ);

	$ip = $ARRAY[0]["address"];
	$interface = $ARRAY[0]["list"];

	// Buscar clientes DHCP en la interface de la persona
	// https://forum.mikrotik.com/viewtopic.php?t=131106#p644028
	$arrResult = $API->comm('/ip/dhcp-client/print', array ("?interface" =>  strtolower($interface)));

	//dhcp-client release
	// https://forum.mikrotik.com/viewtopic.php?t=131106#p644028
	foreach ($arrResult as $item) {
		$API->write('/ip/dhcp-client/release', false);
		$API->write('=numbers=' . $item ['.id']);
		$API->read (false);
	}
}
else
{
	$API->disconnect();
}

?>
