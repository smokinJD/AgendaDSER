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
        </tr>
        <?php
            for($i=0;$i<count($pd);$i++)
            {
                ?>
                    <tr>
                        <td><?php echo $pd[$i]["Nombre"]; ?></td>
                        <td><?php echo $pd[$i]["Apellidos"]; ?></td>
                        <td><?php echo $pd[$i]["Telefono"]; ?></td>
                    </tr>
                <?php
            }
        ?>
    </table>
</body>
</html>

