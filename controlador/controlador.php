<?php
    //lamada al Modelo
    require_once("../modelo/contactos_model.php");
    $Agenda = new contactos();
    $pd = $Agenda->get_contactos();
    //lamada a la Vista
    require_once("../vista/listadoAgenda.php");
?>

