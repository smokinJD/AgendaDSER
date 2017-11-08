<?php
//lamada al Modelo
    require_once("../modelo/MostrarTablas_model.php");
    $Usuarios = new usuarios();
    $pd = $Usuarios->get_usuarios();
    $contactos = $Usuarios->get_contactos();
    //isertar Usuario
    if ($_POST){
    $nombre= filter_input(INPUT_POST, 'nombreUser');
    $pass= filter_input(INPUT_POST, 'pass');
    $admin= filter_input(INPUT_POST, 'admin');
    
    if (empty($nombre) || empty($pass) || empty($admin)){
            echo "<p>Los datos estan vacios</p>";
        } else{
            if ($admin == "Administrador"){
                $admin=1;
            } else {
                $admin=0;
            }
            $insertUser = $Usuarios->insertarUsuarios($nombre,$pass, $admin);
            
            }
    }
    
    //lamada a la Vista
    require_once("../vista/BorrarInsertar.php");
?>

