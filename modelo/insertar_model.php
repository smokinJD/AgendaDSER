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
        $sql="SELECT c.Nombre, c.Apellidos, c.Telefono, e.Correo, g.Nombre as grupo FROM contactos c, email e, grupos g, gruposcontactos gc WHERE c.id=e.idContacto AND c.id=gc.idContacto AND gc.idGrupo=g.id";
        foreach ($this->db->query($sql) as $res)
        {
            $this->contactos[]=$res;
        }
        return $this->contactos;
        $this->db=null;
    }
}
?>

