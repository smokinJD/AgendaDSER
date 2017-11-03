<?php
    require_once("../modelo/contactos_model.php");
    $Agenda = new contactos();
    $pd = $Agenda->get_contactos();
    require_once("../vista/listadoAgenda.php");
?>

