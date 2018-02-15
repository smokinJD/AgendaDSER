<?php
class contactos{
    private $db;
    private $contactos;
 
    public function __construct()
    {
        $this->contactos = array();
        $this->db = conectar::conexion();
    }
 
    public function get_contactos($orden)
    {   
        $sql="SELECT contactos.*, GROUP_CONCAT(DISTINCT correo) as emails, GROUP_CONCAT(DISTINCT grupos.Nombre) as grupos FROM contactos LEFT JOIN email ON email.idContacto=contactos.id LEFT JOIN gruposcontactos ON gruposcontactos.idContacto=contactos.id LEFT JOIN grupos ON gruposcontactos.idGrupo=grupos.id GROUP BY contactos.id $orden;";
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
    
    public function insertarConSentencia($nombre, $apellido, $telefono, $poblacion){
    	$sql="INSERT INTO contactos(Nombre,Apellidos,Telefono,Poblacion) VALUES(:nombre,:apellido,:telefono,:poblacion)";
    	$sqlPrep = $this->db->prepare($sql);
    	$sqlPrep->bindParam(':nombre', $nombre, PDO::PARAM_STR, 20);
    	$sqlPrep->bindParam(':apellido', $apellido, PDO::PARAM_STR, 20);
    	$sqlPrep->bindParam(':telefono', $telefono, PDO::PARAM_INT);
    	$sqlPrep->bindParam(':poblacion', $poblacion, PDO::PARAM_STR, 40);
    	$sqlPrep->execute();
    	$this->db=null;
    	
    	
    	//Para hacer con mysqli
    	
    	//$sql="INSERT INTO contactos(Nombre,Apellidos,Telefono,Poblacion) VALUES(?,?,?,?)";// ? el simbolo de interrogacion es el parametro
    	//$sqlPrep->bind_param("s","s","i","s",$nombre,$apellido,$telefono,$poblacion);  //este sirve para cuando hago la conexion con mysqli
    	//$sqlPrep->bindParam("s","s","i","s", $nombre,$apellido,$telefono,$poblacion); // las "s" y "i" significan el tipo que es cada parametro, por ejemplo "s" es string
    	//$this->db->close(); este sirve para cerrar un mysqli
    	
    	
    	//esto sirve para obtener resultados por ejemplo para recoger una select
//     	$result=$sqlPrep->get_result();
//     	if($result->num_rows>0){
//     		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
//     			$this->contactos[]=$res;
//     		}
//     	}
    }
    
    public function borrar($idBorrado){
        $sql="DELETE FROM contactos WHERE id='$idBorrado'";
        $this->db->query($sql);
    }
}
?>

