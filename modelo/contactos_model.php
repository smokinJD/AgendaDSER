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
 
    public function get_contactos()
    {   
        $sql="SELECT c.Nombre, c.Apellidos, c.Telefono, GROUP_CONCAT(distinct e.Correo, '\n') Correo, GROUP_CONCAT(DISTINCT g.Nombre, '\n') as Grupo FROM contactos c, email e, grupos g, gruposcontactos gc WHERE c.id=e.idContacto AND c.id=gc.idContacto AND gc.idGrupo=g.id GROUP BY c.id";
        foreach ($this->db->query($sql) as $res)
        {
            $this->contactos[]=$res;
        }
        return $this->contactos;
        $this->db=null;
    }
}
?>

