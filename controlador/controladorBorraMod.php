<?php
//lamada al Modelo
    require_once("../modelo/MostrarTablas_model.php");
    $Usuarios = new usuarios();
    $pd = $Usuarios->get_usuarios();
    $contactos = new contactos();
    $pd = $contactos->get_contactos();
    //lamada a la Vista
    require_once("../vista/BorrarInsertar.php");
?>

