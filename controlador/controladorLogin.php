<?php
session_start();
require_once("../modelo/conectar.php");
$usuario = $_POST['username'];
$contrasena = $_POST['password'];


require_once '../modelo/login_model.php';

$cont=new login_model();
$datos=$cont->get_login($usuario, $contrasena);
for($i=0;$i<count($datos);$i++){
	$id = $datos[$i]['idUsuario'];
	if ($datos[$i]['Admin'] == true){
		$rol = 'Administrador';
	}else {
		$rol = 'Viewer';
	}
}

if ($datos != null){
    $_SESSION['loggedin'] = true;
    $_SESSION['id'] = $id;
    $_SESSION['username'] = $usuario;
    $_SESSION['rol'] = $rol;
    $_SESSION['start'] = time();
    $_SESSION['expire'] = $_SESSION['start'] + (30 * 60);

    header('location: ../controlador/controladorContactos.php');
}else{
    echo '<script>alert ("Usuario o contraseña incorrectos");</script><meta http-equiv="refresh" content="0; url=../index.php">';
}

// require_once("../modelo/conectar.php");
// //if ($_SERVER["REQUEST_URI"] == "/agenda/index.php") {
//    // require_once("../modelo/mLogin.php");
//   //} else {
//     require_once("../modelo/login_model.php");
//   //}
//     $comprobar = new comprobarUsuario();
//     if ((isset($_POST['username'])) && (isset($_POST['password']))){
//       if ($comprobar->comprobarUsuario()) {
//         echo "ESTAS LOGUEADO";
//       } else {
//         echo "NO ESTÁS LOGUEADO";
//       }
//     }
//     if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
//       require_once("vista/listadoAgenda.php");
//     } else {
//       if ($_SERVER["REQUEST_URI"] == "/agenda/index.php") {
//           require_once("index.php");
//         } else {
//           require_once("index.php");
//         }
//     }
?>