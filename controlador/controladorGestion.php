<?php
//lammada a la base de datos
    require_once("../modelo/conectar.php");
//lamada al Modelo
    //usuarios
    require_once("../modelo/usuarios_model.php");
    $Usuarios = new usuarios();
    $pd = $Usuarios->get_usuarios();
    
        //insertar Usuario
        if ($_POST){
        $nombre= filter_input(INPUT_POST, 'nombreUser');
        $pass= filter_input(INPUT_POST, 'password');
        $admin= filter_input(INPUT_POST, 'admin');

        if (empty($nombre) || empty($pass) || empty($admin)){
                echo "<p>Los datos estan vacios</p>";
            } else{
                if ($admin == "Administrador"){
                    $admin=1;
                } else if ($admin == "Viewer"){
                    $admin=0;
                }
                $insertUser = $Usuarios->insertarUsuarios($nombre,$pass, $admin);
                echo ('<meta http-equiv="refresh" content="0"/>');
                }      
        }
        //borrar usuario
        
    //Contactos
    require_once("../modelo/contactos_model.php");
    $contactos= new contactos();
    $contac = $contactos->get_contactos();
    
    //lamada a la Vista
    require_once("../vista/BorrarInsertar.php");
?>

