<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Modelo-vista-controlador</title>
</head>
<body>
    <h1>Usuarios</h1>
    <table border="0">
        <tr>
            <td><strong>Nombre</strong></td>
            <td><strong>Contraseña</strong></td>
            <td><strong>Admin</strong></td>
        </tr>
        <?php
            for($i=0;$i<count($pd);$i++)
            {
                ?>
                    <tr>
                        <td><?php echo $pd[$i]["Nombre"]; ?></td>
                        <td><?php echo $pd[$i]["Contraseña"]; ?></td>
                        <?php if ($pd[$i]['Admin'] == TRUE){ ?>
                        <td>Administrador</td>
                        <?php }else {?>
                        <td>Viewer</td>
                        <?php
                        }
                        ?>
                        <td class="boton"><input type="submit" name="borrar" value="borrar"></td>
                    </tr>
                <?php
            }
        ?>
                    <form action="controladorGestion.php" method="post">
                    <tr>
                        <td><input type="text" name="nombreUser" value=""></td>
                        <td><input type="password" name="password" value=""></td>
                        <td><input type="text" name="admin" value=""></td>
                        <td class="boton"><input type="submit" name="insertar" value="insertar"></td>
                    </tr>
                    </form>
    </table>
    
    <h1>Contactos</h1>
    <table border="1">
        <tr>
            <td><strong>Nombre</strong></td>
            <td><strong>Apellidos</strong></td>
            <td><strong>Admin</strong></td>
        </tr>
        <?php
            for($i=0;$i<count($contac);$i++)
            {
                ?>
                    <tr>
                        <td><?php echo $contac[$i]["Nombre"]; ?></td>
                        <td><?php echo $contac[$i]["Apellidos"]; ?></td>
                        <td><?php echo $contac[$i]["Telefono"]; ?></td>
                    </tr>
                <?php
            }
        ?>
    </table>
</body>
</html>
