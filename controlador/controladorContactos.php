<?php
    //lamada al Modelo
    require_once("../modelo/conectar.php");
    require_once("../modelo/contactos_model.php");
    $Agenda = new contactos();
    //mostrar Listado
    $pd = $Agenda->get_listado();
    //hacer insertar
    if ($_POST){
        $nombre= filter_input(INPUT_POST, 'nombre');
        $apellido= filter_input(INPUT_POST, 'apellido');
        $telefono= filter_input(INPUT_POST, 'telefono');
        $email1= filter_input(INPUT_POST, 'email');
        $grupos= $_POST['grupos'];
        
        if (empty($nombre) || empty($apellido) || empty($telefono) || empty($email1)){
                echo "<p>Los datos estan vacios</p>";
            } else{
                //$insertUser = $Usuarios->insertarUsuarios($nombre,$pass, $admin);
                //echo ('<meta http-equiv="refresh" content="0"/>');
                $count = count($grupos);
                if (!empty($_POST['grupos'])){
                for ($i = 0; $i < $count; $i++) {
                     if($i==0){
                        $grupo1 = $grupos[0];
                     }
                     if($i==1){
                    $grupo2 = $grupos[1];
                     }
                    echo '<p> holaa'.$grupo2. '</p>';
                }
                $insertar = $Agenda->insertar($nombre, $apellido, $telefono, $email1, $correo2, $grupo1, $grupo2, "");
                echo ('<meta http-equiv="refresh" content="0"/>');
                }
            }
        }
        
    //Hacer el delete
    
    //lamada a la Vista
    require_once("../vista/listadoAgenda.php");
?>

