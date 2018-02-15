<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Agenda</title>
</head>
<body>
    <h1>Agenda</h1>
    <h3>Login</h3>
    <form action="controlador/controladorLogin.php" method="POST">
        <p>Nombre:</p>
        <input type="text" name="username" required/>
        <p>Contraseña:</p>
        <input type="password" name="password" required/>
        <p><input type="submit" value="Iniciar Sesion" /></p>
    </form>
    <br/>
    
    <!--<h3>Registro</h3>
    <form action="controlador/controladorRegistro.php" method="POST">
        <p>Nombre:</p>
        <input type="text" name="username" required/>
        <p>Contraseña:</p>
        <input type="password" name="password" required/>
        <p><input type="submit" value="Iniciar Sesion" /></p>
    </form>-->
</body>
</html>
