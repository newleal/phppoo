<?php

require_once __DIR__ . '/../src/functions.php';
require_once __DIR__ . '/../src/Database.php';
require_once __DIR__ . '/../src/User.php';

session_start();

$mensaje = '';
$user = new User();

if($_SERVER['REQUEST_METHOD']== "POST")
{
    $email = limpiarEntrada($_POST['email']);
    $password = $_POST['password'];

    if(empty($email) || empty($password))
    {
        $mensaje = 'Por favor completa todos los campos.';
    } else{

        $loggedUser = $user->login($email, $password);
        echo var_dump($loggedUser);
        if($loggedUser)
        {
            $_SESSION['user_id'] = $loggedUser['id'];
            header("Location: perfil.php");
            exit();
        } else{
            $mensaje = 'Email o contraseña incorrectos.';
        }
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Iniciar sesion</h1>
    <?php if($mensaje):?>
        <p><?php echo $mensaje; ?></p>
    <?php endif; ?>
    
    <form method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" required>

        <label for="email">Email:</label>
        <input type="text" name="email" id="email" required>

        <label for="password">Contraseña:</label>
        <input type="password" name="password" id="password" required>

        <input type="submit" value="Iniciar sesion">
    </form>
    <p><a href="registro.php">Registrarse</a></p>
    <p><a href="index.php">Volver al incio</a></p>
    
</body>
</html>