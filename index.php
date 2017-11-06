<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Agenda</title>
</head>
<body>
    <h1>Agenda</h1>
    <form action="logeatu.php" method="POST">
        <p>Nombre:</p>
        <input type="text" name="txt_izena" required/>
        <p>Contraseña:</p>
        <input type="password" name="txt_pass" required/>
        <p><input type="submit" value="Enviar" /></p>
    </form>
    <br/>
    <section>
        <a href="controlador/controladorListado.php">Listado Agenda</a>
        <a href="controlador/controladorBorraMod.php">Gestion</a>
    </section>
</body>
</html>
