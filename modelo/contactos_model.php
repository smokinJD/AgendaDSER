<?php
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
        $sql=" CALL `mostrar`();";
        foreach ($this->db->query($sql) as $res)
        {
            $this->contactos[]=$res;
        }
        return $this->contactos;
        $this->db=null;
    }
    
    public function get_listado()
    {   
        $sql="SELECT contactos.id, contactos.Nombre, contactos.Apellidos, contactos.Telefono, GROUP_CONCAT(DISTINCT correo) as emails, GROUP_CONCAT(DISTINCT grupos.Nombre) as grupos FROM contactos LEFT JOIN email ON email.idContacto=contactos.id LEFT JOIN gruposcontactos ON gruposcontactos.idContacto=contactos.id LEFT JOIN grupos ON gruposcontactos.idGrupo=grupos.id GROUP BY id";
        
        foreach ($this->db->query($sql) as $res)
        {
            $this->contactos[]=$res;
        }
        return $this->contactos;
        $this->db=null;
    }
    
    public function insertar($nombre, $apellido, $telefono, $correo1, $correo2, $grupo1, $grupo2, $grupo3, $poblacion){
        $sql=" CALL `spInsertUpdate`('$nombre', '$apellido', '$telefono', '$correo1', '$correo2', '$grupo1', '$grupo2', '$grupo3', '', '$poblacion');";
        $this->db->query($sql);
    }
    
    public function borrar($idBorrado){
        $sql="DELETE FROM contactos WHERE id='$idBorrado'";
        $this->db->query($sql);
    }
}
?>

