<?php
    //lamada al Modelo
    require_once("../modelo/conectar.php");
    require_once("../modelo/contactos_model.php");
    $Agenda = new contactos();
    //mostrar Listado
    $opcion = "";
    $pd = $Agenda->get_contactos();
    
    // Recoger datos del form post
    if($_POST){
    $idContactos = filter_input(INPUT_POST, 'id');
    $idModificar = "";
    //hacer insertar
    if (isset($_POST['insertar'])){
        $nombre= filter_input(INPUT_POST, 'nombre');
        $apellido= filter_input(INPUT_POST, 'apellido');
        $telefono= filter_input(INPUT_POST, 'telefono');
        $poblacion= filter_input(INPUT_POST, 'poblacion');
        $email1= filter_input(INPUT_POST, 'email'); 
        
        if (empty($nombre) || empty($apellido) || empty($telefono) || empty($email1) || empty($poblacion)){
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
                $insertar = $Agenda->insertar($nombre, $apellido, $telefono, $email1, $correo2, $grupo1, $grupo2, "", $poblacion);
                echo '<script>alert ("Contacto Insertado Satisfactoriamente");</script>';
                echo ('<meta http-equiv="refresh" content="0"/>');
                }
            }
    }
        
    //Hacer el delete
    if (isset($_POST['borrar'])){
        $borrar = $Agenda->borrar($idContactos);
        echo '<script>alert ("Contacto borrado correctamente");</script>';
        echo ('<meta http-equiv="refresh" content="0"/>');
    }
    
    //Hacer el Update
    //recoger datos del contacto escogido para el update
    if (isset($_POST['modificar'])){
        $idModificar = $idContactos;
    	for($i=0;$i<count($pd);$i++){
    	if ($pd[$i]["id"]==$idContactos){
    		$mostrarNombreMod =  $pd[$i]['Nombre'];
    		$mostrarApellidoMod =  $pd[$i]['Apellidos'];
    		$mostrarTelefonoMod =  $pd[$i]['Telefono'];
    		$mostrarEmailMod =  $pd[$i]['emails'];
                $mostrarPoblacionMod = $pd[$i]['Poblacion'];
                if ($pd[$i]["grupos"] == 'Familia'){
                    $mostrarGrupoFamilia = 1;
                }
                if ($pd[$i]["grupos"] == 'Amigos'){
                    $mostrarGrupoFamilia = 2;
                }
                if ($pd[$i]["grupos"] == 'Familia,Amigos'){
                    $mostrarGrupoFamilia = 3;
                }
    	}
    	}
    }
    
    //pasar los parametros para el update
    if (isset($_POST['editar'])){
        $nombre= filter_input(INPUT_POST, 'nombre');
        $apellido= filter_input(INPUT_POST, 'apellido');
        $telefono= filter_input(INPUT_POST, 'telefono');
        $poblacion= filter_input(INPUT_POST, 'poblacion');
        $email1= filter_input(INPUT_POST, 'email');
        
        if (empty($nombre) || empty($apellido) || empty($telefono) || empty($email1) || empty($poblacion) || empty($idModificar)){
            echo '<script>alert ('. $idModificar.');</script>';    
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
                //$Modificar = $Agenda->insertar($nombre, $apellido, $telefono, $email1, $correo2, $grupo1, $grupo2, $idModificar, $poblacion);
                echo '<script>alert ("Contacto Insertado Satisfactoriamente");</script>';
                //echo ('<meta http-equiv="refresh" content="0"/>');
                }
            }
    }
    }
    //lamada a la Vista
    require_once("../vista/listadoAgenda.php");
?>

