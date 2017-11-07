<?php
    class conectar{
        public function conexion() {
            try{
                $conexion = new PDO('mysql:host=localhost; dbname=agenda', 'root', '');
                $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $conexion->query("SET NAMES 'utf8'");
            } catch (Exception $ex) {
                die ("error". $ex->getMessage());
                echo "Linea de error" . $ex->getLine();

            }
            return $conexion;
        }
    }
    
?>

