<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Agenda</title>
</head>
<body>
    <h1>Agenda</h1>
    <form action="controlador/controladorLogin.php" method="POST">
        <p>Nombre:</p>
        <input type="text" name="username" required/>
        <p>Contraseña:</p>
        <input type="password" name="password" required/>
        <p><input type="submit" value="Iniciar Sesion" /></p>
    </form>
    <br/>
    <section>
        <a href="controlador/controladorGestion.php">Gestion</a>
    </section>
</body>
</html>
