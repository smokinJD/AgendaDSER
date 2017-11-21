<?php
    //lamada al Modelo
    require_once("../modelo/conectar.php");
    require_once("../modelo/contactos_model.php");
    $Agenda = new contactos();
    //mostrar Listado
    $opcion = "";
    $pd = $Agenda->get_contactos($opcion,"");
    
    // Recoger datos del form post
    if($_POST){
    $id = filter_input(INPUT_POST, 'id');
    //hacer insertar
    if (isset($_POST['insertar'])){
        $nombre= filter_input(INPUT_POST, 'nombre');
        $apellido= filter_input(INPUT_POST, 'apellido');
        $telefono= filter_input(INPUT_POST, 'telefono');
        $email1= filter_input(INPUT_POST, 'email'); 
        
        if (empty($nombre) || empty($apellido) || empty($telefono) || empty($email1)){
                echo '<script>alert ("Los datos estan vacios");</script>';
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
    if (isset($_POST['borrar'])){
        $borrar = $Agenda->borrar($id);
        echo '<script>alert ("Contacto borrado correctamente");</script>';
        echo ('<meta http-equiv="refresh" content="0"/>');
    }
    
    //Hacer el Update
    //recoger datos del contacto escogido para el update
    if (isset($_POST['modificar'])){
    	for($i=0;$i<count($pd);$i++){
    	if ($pd[$i]["id"]==$id){
    		$mostrarNombreMod =  $pd[$i]['Nombre'];
    		$mostrarApellidoMod =  $pd[$i]['Apellidos'];
    		$mostrarTelefonoMod =  $pd[$i]['Telefono'];
    		$mostrarEmailMod =  $pd[$i]['emails'];
    	}
    	}
    }
    }
    //lamada a la Vista
    require_once("../vista/listadoAgenda.php");
?>

