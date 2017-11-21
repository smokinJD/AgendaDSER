<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Modelo-vista-controlador</title>
</head>
<body>
<?php
session_start();
?>
<p>Hola, <?php echo $_SESSION['username']; ?> <a href='../controlador/logout.php'>salir</a></p>
    <h1>Agenda</h1>
    
    <table border="1">
        <tr>
            <td><strong>Grupos</strong></td>
            <td><strong>Contactos</strong></td>
        </tr>
        <?php
            for($i=0;$i<count($pd);$i++)
            {
                ?>
                    <tr>
                        <td><?php echo $pd[$i]["Nombre"]; ?></td>
                        <td><?php echo $pd[$i]["contactos"]; ?></td>
                    </tr>
                <?php
            }
            ?>
    </table>
</body>
</html>
