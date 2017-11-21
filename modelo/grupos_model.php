<?php
class grupos{
    private $db;
    private $grupos;
 
    public function __construct()
    {
        $this->grupos = array();
        $this->db = conectar::conexion();
    }
    public function get_listado()
    {   
        $sql="SELECT grupos.Nombre, GROUP_CONCAT(DISTINCT contactos.Nombre SEPARATOR '</br>') as contactos FROM grupos LEFT JOIN gruposcontactos ON grupos.id=gruposcontactos.idGrupo LEFT JOIN contactos ON gruposcontactos.idContacto=contactos.id GROUP BY grupos.id";
        
        foreach ($this->db->query($sql) as $res)
        {
            $this->grupos[]=$res;
        }
        return $this->grupos;
        $this->db=null;
    }
}
?>

