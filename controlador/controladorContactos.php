<?php
    //lamada al Modelo
    require_once("../modelo/conectar.php");
    require_once("../modelo/contactos_model.php");
    $Agenda = new contactos();
    $pd = $Agenda->get_listado();
    //lamada a la Vista
    require_once("../vista/listadoAgenda.php");
?>

