<?php
require_once("../modelo/conectar.php");
require_once("../modelo/grupos_model.php");
$listado = new grupos();
$pd = $listado->get_listado();
//lamada a la Vista
require_once("../vista/listadoGrupos.php");

