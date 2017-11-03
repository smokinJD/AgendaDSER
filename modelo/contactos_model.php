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
 
    private function set_names()
    {
        return $this->db->query("SET NAMES 'utf8'");
    }
 
    public function get_contactos()
    {
        self::set_names();
        $sql="select * from contactos";
        foreach ($this->db->query($sql) as $res)
        {
            $this->contactos[]=$res;
        }
        return $this->contactos;
        $this->db=null;
    }
}
?>

