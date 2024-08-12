<?php

require_once __DIR__ . '/../src/functions.php';
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../src/User.php';

$mensaje = '';
$user = new User();

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $nombre = limpiarEntrada($_POST['nombre']);
    $email = limpiarEntrada($_POST['email']);
    $password = $_POST['password'];

    if(empty($nombre) || empty($email) || empty($password) )
    {
        $mensaje = 'Por favor, completa todos los campos.';
    } elseif(!validarEmail($email)){
        $mensaje = 'Por favor introduce un Email válido.';
    }else{
        
        if($user->register($nombre, $email, $password))
        {
            $mensaje = 'Usuario registrado con exito!';
        } else{
            $mensaje = 'Error al registrar usuario!';
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de usuario</title>
</head>
<body>
    <h1>Registro de usuarios</h1>
    <?php if($mensaje): ?>
       <p><?php echo '<h2><strong style="color=red">'. $mensaje .'</strong><h2>'?>
    <?php endif; ?>

    <form action="registro.php" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre">

        <label for="email">Email:</label>
        <input type="text" name="email" id="email">

        <label for="password">Contraseña:</label>
        <input type="password" name="password" id="password">

        <input type="submit" value="Registrar">
    </form>
    <p><a href="index.php">Volver al incio</a></p>
</body>
</html>