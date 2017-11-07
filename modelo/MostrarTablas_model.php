<?php
include 'conectar.php';
class Usuarios{
    private $db;
    private $usuarios;
    private $contactos;


    public function __construct()
    {
        $this->usuarios = array();
        $this->db = conectar::conexion();
    }
 
    public function get_usuarios()
    {
        
        $sql="SELECT * FROM usuarios";
        foreach ($this->db->query($sql) as $res)
        {
            $this->usuarios[]=$res;
        }
        return $this->usuarios;
        $this->db=null;
    }
    
    public function insertarUsuarios($nombre, $pass, $admin){
        $sql="INSERT INTO usuarios (`Nombre`,`Contraseña`,`Admin`) VALUES ('$nombre','$pass','$admin')";
            $this->db->query($sql);
            //mysqli_free_result($result);
    }


    public function get_contactos()
    {   
        $sql="SELECT * FROM contactos";
        foreach ($this->db->query($sql) as $res)
        {
            $this->contactos[]=$res;
        }
        return $this->contactos;
        $this->db=null;
    }
}
?>

