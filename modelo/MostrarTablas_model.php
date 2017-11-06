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
 
    private function set_names()
    {
        return $this->db->query("SET NAMES 'utf8'");
    }
 
    public function get_usuarios()
    {
        self::set_names();
        
        $sql="SELECT * FROM usuarios";
        foreach ($this->db->query($sql) as $res)
        {
            $this->usuarios[]=$res;
        }
        return $this->usuarios;
        $this->db=null;
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

