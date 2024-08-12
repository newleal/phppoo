<?php
session_start();

require_once __DIR__ . '/../src/functions.php';
require_once __DIR__ . '/../src/Database.php';
require_once __DIR__ . '/../src/User.php';


if(!isset($_SESSION['user_id']))
{
    header("Location: login.php");
    exit();
}

$user = new User();
$userData = $user->getUser($_SESSION['user_id']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
</head>
<body>
    <h1>Perfil usuario</h1>
    <p>Nombre: <?php echo htmlspecialchars($userData['nombre']); ?></p>
    <p>Email: <?php echo htmlspecialchars($userData['email']); ?></p>

    <p><a href="logout.php">Cerrar sesion</a></p>
    <p><a href="index.php">Volver al inicio</a></p>
</body>
</html>