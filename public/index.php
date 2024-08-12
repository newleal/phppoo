<?php

require_once __DIR__ . '/../src/functions.php';
require_once __DIR__ . '/../config/database.php';

echo "<h1>" . saludar('Visitante') . "</h1>";

echo "<h2>Usuarios en la base de datos</h2>";

$stmt = $pdo->query("SELECT * FROM users");

echo "<ul>";

    while($row = $stmt->fetch())
    {
        echo "<li>". htmlspecialchars($row['nombre']) ."-".  htmlspecialchars($row['email']) . "</li>";
    }

echo "</ul>";

echo '<p><a href="registro.php">Registro</a></p>';
echo '<p><a href="login.php">Login</a></p>';


?>

