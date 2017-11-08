<?php
include 'conectar.php';
class contactos{
    private $db;
    private $contactos;
 
    public function __construct()
    {
        $this->contactos = array();
        $this->db = conectar::conexion();
    }
 
    public function insertarUsuarios($nombre, $pass, $admin){
    	$sql="INSERT INTO usuarios (`Nombre`,`Contraseña`,`Admin`) VALUES ('$nombre','$pass','$admin')";
    	$this->db->query($sql);
    	//mysqli_free_result($result);
    }
}
?>

