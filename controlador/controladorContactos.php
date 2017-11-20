<?php
    //lamada al Modelo
    require_once("../modelo/conectar.php");
    require_once("../modelo/contactos_model.php");
    $Agenda = new contactos();
    //mostrar Listado
    $pd = $Agenda->get_listado();
    
    // Recoger datos del form post
    if($_POST){
    $id = filter_input(INPUT_POST, 'id');
    //hacer insertar
    if (filter_input(INPUT_POST,'insertar')){
        $nombre= filter_input(INPUT_POST, 'nombre');
        $apellido= filter_input(INPUT_POST, 'apellido');
        $telefono= filter_input(INPUT_POST, 'telefono');
        $email1= filter_input(INPUT_POST, 'email'); 
        
        if (empty($nombre) || empty($apellido) || empty($telefono) || empty($email1)){
                echo "<p>Los datos estan vacios</p>";
        } else{
                $grupos= $_POST['grupos'];
                $count = count($grupos);
                if (!empty($_POST['grupos'])){
                for ($i = 0; $i < $count; $i++) {
                     if($i==0){
                        $grupo1 = $grupos[0];
                     }
                     if($i==1){
                    $grupo2 = $grupos[1];
                     }
                    //echo '<p> holaa'.$grupos[$i]. '</p>';
                }
                $insertar = $Agenda->insertar($nombre, $apellido, $telefono, $email1, $correo2, $grupo1, $grupo2, "");
                echo '<script>alert ("Contacto Insertado Satisfactoriamente");</script>';
                echo ('<meta http-equiv="refresh" content="0"/>');
                }
            }
    }
        
    //Hacer el delete
    if (filter_input(INPUT_POST,'borrar')){
        echo 'hola'. $id;
        $borrar = $Agenda->borrar($id);
        echo '<script>alert ("Contacto borrado correctamente");</script>';
        echo ('<meta http-equiv="refresh" content="0"/>');
    }
    
    //Hacer el Update
    if (filter_input(INPUT_POST,'modificar')){
        
    }
    }
    //lamada a la Vista
    require_once("../vista/listadoAgenda.php");
?>

