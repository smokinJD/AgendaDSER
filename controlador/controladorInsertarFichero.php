<?php
//lamada al Modelo
require_once("../modelo/conectar.php");
require_once("../modelo/contactos_model.php");
$Agenda = new contactos();

$filas = file('../contactos.txt');

foreach ($filas as $value) {
	list($nombre, $apellido, $telefono, $poblacion) = explode("::", $value);
	
	$insertar = $Agenda->insertarConSentencia($nombre, $apellido, $telefono, $poblacion);
}

echo ('<meta http-equiv="refresh" content="0"/>');