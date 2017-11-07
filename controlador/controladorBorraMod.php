<?php
//lamada al Modelo
    require_once("../modelo/MostrarTablas_model.php");
    $Usuarios = new usuarios();
    $pd = $Usuarios->get_usuarios();
    
    //isertar Usuario
    $nombre= filter_input(INPUT_POST, 'nombreUser');
    $pass= filter_input(INPUT_POST, 'pass');
    $admin= filter_input(INPUT_POST, 'admin');
    $error ="";
    if ($_POST){
    if ((isset($nombre) || isset($pass) || isset($admin))){
                        $error = "Los datos estan vacios";
                    } else{
                        $insertUser = $Usuarios->insertarUsuarios($nombre,$pass, $admin);
                    }
    }
    
    $contactos = $Usuarios->get_contactos();
    //lamada a la Vista
    require_once("../vista/BorrarInsertar.php");
?>

