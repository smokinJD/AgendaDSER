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
    <fieldset>
      <legend>Ordenar por:</legend>


      <form method="post" action="controladorContactos.php">
        <label class="radio-inline">
          <input type="radio" name="orden"
          <?php if (isset($_COOKIE["orden"]) && $_COOKIE["orden"]=="Nombre") echo "checked";?>
          value="Nombre">Nombre
        </label>
        <label class="radio-inline">
          <input type="radio" name="orden"
          <?php if (isset($_COOKIE["orden"]) && $_COOKIE["orden"]=="Apellidos") echo "checked";?>
          value="Apellidos">Apellido
        </label>
        <label class="radio-inline">
          <input type="radio" name="orden"
          <?php if (isset($_COOKIE["orden"]) && $_COOKIE["orden"]=="grupo") echo "checked";?>
          value="grupo">Grupo
        </label>
        <button type="submit" class="btn btn-default">Buscar</button>
        <button type="submit" class="btn btn-default" name="borrarOrden">Borrar Orden</button>
      </form>
    </fieldset>
    
    <br>
    <table border="1">
        <tr>
            <td><strong>Nombre</strong></td>
            <td><strong>Apellidos</strong></td>
            <td><strong>Telefono</strong></td>
            <td><strong>Email</strong></td>
            <td><strong>Grupo</strong></td>
            <td><strong>Poblacion</strong></td>
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
                        <td><?php echo $pd[$i]["Poblacion"]; ?></td>
                        <?php 
                        if($_SESSION['rol'] == 'Administrador'){
                        ?>
                        <td>
                            <form action="controladorContactos.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $pd[$i]["id"]; ?>">
                            <input type="submit" name="borrar" value="borrar">
                            <input type="submit" name="modificar" value="modificar">
                            </form>
                        </td>
                        <?php 
                        }
                        ?>
                    </tr>
                <?php
            }
            if($_SESSION['rol'] == 'Administrador'){
        ?>
                    <form action="controladorContactos.php" method="post">
                    <tr>
                    <?php
                    if (isset($_POST['modificar'])){
                     ?>
                        <td><input type="text" name="nombre" value="<?php echo $mostrarNombreMod;?>" ></td>
                        <td><input type="text" name="apellido" value="<?php echo $mostrarApellidoMod;?>" ></td>
                        <td><input type="number" name="telefono" maxlength="9" value="<?php echo $mostrarTelefonoMod;?>"></td>
                        <td><input type="email" name="email" value="<?php echo $mostrarEmailMod;?>"></td>
                        <td>
                            <?php 
                            if (($mostrarGrupoFamilia==1) || ($mostrarGrupoFamilia==3)){
                            ?>
                            <input type="checkbox" name="grupos[]" value="1" checked=""> Familia<br>
                            <?php 
                            }else{
                            ?>
                            <input type="checkbox" name="grupos[]" value="1"> Familia<br>
                            <?php 
                            }
                            if ($mostrarGrupoFamilia==2 || $mostrarGrupoFamilia==3){
                            ?>
                            <input type="checkbox" name="grupos[]" value="2" checked=""> Amigos
                            <?php 
                            }else{
                            ?>
                            <input type="checkbox" name="grupos[]" value="2"> Amigos
                            <?php 
                            }
                            ?>
                        </td>
                        <td><input type="text" name="poblacion" value="<?php echo $mostrarPoblacionMod;?>"></td>
                        <td>
                            <input type="submit" name="editar" value="editar">
                        </td>
                        <?php
                            }else{ 
   			?>
   			<td><input type="text" name="nombre" value="" ></td>
                        <td><input type="text" name="apellido" value="" ></td>
                        <td><input type="number" name="telefono" maxlength="9" value="" ></td>
                        <td><input type="email" name="email" ></td>
                        <td>
                            <input type="checkbox" name="grupos[]" value="1"> Familia<br>
                            <input type="checkbox" name="grupos[]" value="2"> Amigos
                        </td>
                        <td><input type="text" name="poblacion" value=""></td>
   			<td>
                        <input type="submit" name="insertar" value="insertar">
                        </td>
                        <?php
   						 }
                        ?>
                    </tr>
                    </form>
                    <?php
   						 }
                    ?>
    </table>
    	<?php 
			 if($_SESSION['rol'] == 'Administrador'){
			 	echo "<p><a href='../controlador/controladorGestion.php'>Gestion Usuarios</a></p>";
                echo "<p><a href='../controlador/controladorGrupos.php'>Listado Grupos</a></p>";
                echo "<p><a href='../controlador/controladorInsertarFichero.php'>Insertar por fichero</a></p>";
			 }
        ?>
</body>
</html>

