<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Modelo-vista-controlador</title>
</head>
<body>
    <h1>Agenda</h1>
    <table border="1">
        <tr>
            <td><strong>Nombre</strong></td>
            <td><strong>Apellidos</strong></td>
            <td><strong>Telefono</strong></td>
            <td><strong>Email</strong></td>
            <td><strong>Grupo</strong></td>
        </tr>
        <?php
            for($i=0;$i<count($pd);$i++)
            {
                ?>
                    <tr>
                        <td><?php echo $pd[$i]["Nombre"]; ?></td>
                        <td><?php echo $pd[$i]["Apellidos"]; ?></td>
                        <td><?php echo $pd[$i]["Telefono"]; ?></td>
                        <td><?php echo $pd[$i]["emails"]; ?></td>
                        <td><?php echo $pd[$i]["grupos"]; ?></td>
                        <td class="boton"><input type="button" name="borrar" value="borrar"> <input type="button" name="modificar" value="modificar"></td>
                    </tr>
                <?php
            }
        ?>
                    <form action="controladorContactos.php" method="post">
                    <tr>
                        <td><input type="text" name="nombre" value="" required></td>
                        <td><input type="text" name="apellido" value="" required></td>
                        <td><input type="number" name="telefono" maxlength="9" value="" required></td>
                        <td><input type="email" name="email" required></td>
                        <td>
                            <input type="checkbox" name="grupos[]" value="Amigos"> Amigos<br>
                            <input type="checkbox" name="grupos[]" value="Familia"> Familia 
                        </td>
                        <td class="boton"><input type="submit" name="insertar" value="insertar"></td>
                    </tr>
                    </form>
    </table>
</body>
</html>

