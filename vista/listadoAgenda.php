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
                        <td>
                            <form action="controladorContactos.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $pd[$i]["id"]; ?>">
                            <input type="submit" name="borrar" value="borrar">
                            <input type="submit" name="modificar" value="modificar">
                            </form>
                        </td>
                    </tr>
                <?php
            }
        ?>
                    <form action="controladorContactos.php" method="post">
                    <tr>
                        <td><input type="text" name="nombre" value="" ></td>
                        <td><input type="text" name="apellido" value="" ></td>
                        <td><input type="number" name="telefono" maxlength="9" value="" ></td>
                        <td><input type="email" name="email" ></td>
                        <td>
                            <input type="checkbox" name="grupos[]" value="1"> Familia<br>
                            <input type="checkbox" name="grupos[]" value="2"> Amigos
                        </td>
                        <td class="boton"><input type="submit" name="insertar" value="insertar"></td>
                    </tr>
                    </form>
    </table>
    
</body>
</html>

