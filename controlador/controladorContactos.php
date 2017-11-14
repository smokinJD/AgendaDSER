<?php
    //lamada al Modelo
    require_once("../modelo/conectar.php");
    require_once("../modelo/contactos_model.php");
    $Agenda = new contactos();
    //mostrar Listado
    $pd = $Agenda->get_listado();
    //hacer insert
    if ($_POST){
        $nombre= filter_input(INPUT_POST, 'nombre');
        $apellido= filter_input(INPUT_POST, 'apellido');
        $telefono= filter_input(INPUT_POST, 'telefono');
        $grupos= $_POST['grupos'];
        
        if (empty($nombre) || empty($apellido) || empty($telefono)){
                echo "<p>Los datos estan vacios</p>";
            } else{
                //$insertUser = $Usuarios->insertarUsuarios($nombre,$pass, $admin);
                //echo ('<meta http-equiv="refresh" content="0"/>');
                $count = count($grupos);
                for ($i = 0; $i < $count; $i++) {
                    echo '<p> holaa'.$grupos[$i]. '</p>';
                }
                }      
        }
    //lamada a la Vista
    require_once("../vista/listadoAgenda.php");
?>

