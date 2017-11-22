<?php
class login_model{
	private $link;
	private $usuario;
	
	public function __construct(){
		$this->link=Conectar::conexion();
		$this->usuario=array();
	}
	
	public function get_login($usuario, $contrasena){
		$sql="SELECT * FROM usuarios WHERE Nombre='$usuario' AND Contrasena='$contrasena'";
		foreach ($this->link->query($sql) as $res)
		{
			$this->usuario[]=$res;
		}
		return $this->usuario;
		$this->link=null;
	}
}

// if ($_SERVER["REQUEST_URI"] == "/agenda/index.php") {
//     session_start();
//   }
// class comprobarUsuario {
//     private $username;
//     private $password;
//     private $db;
//     public function __construct() {
//     	$this->db = conectar::conexion();
//     }
//     public function comprobarUsuario() {
        
//   if ((isset($_POST['username'])) && (isset($_POST['password']))){
//         $username = filter_input($POST, 'username');
//         $password = filter_input($POST, 'password');
//         $sql="select idUsuario, Nombre, Contrase�a, Admin rol from usuarios where (username = '$username') AND (u.rol = r.idRol)";
//         $result = mysqli_query($this->db, $sql);
//         if (mysqli_num_rows($result) > 0) {
//           $row = $result->fetch_array(MYSQLI_ASSOC);
//           if (password_verify($password, $row['password'])) {
//              $_SESSION['loggedin'] = true;
//              $_SESSION['rol'] = $row['Admin'];
//              $_SESSION['username'] = $username;
//              $_SESSION['start'] = time();
//              $_SESSION['expire'] = $_SESSION['start'] + (30 * 60);
//              header('Location: ../index.php');
//            return true;
//         } else {
//           return false;
//         }
//         $this->db=null;
//     } else {
//       echo "No existe ese usuario en la BBDD";
//     }
//     }
// }
// }
?>