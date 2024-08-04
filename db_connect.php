<?php

$host = 'localhost';
$db = 'php';
$user = 'root';
$password = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

$options = [

    PDO::ATTR_ERRMODE               =>   PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE    =>   PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES      =>   false
];

try{
    $pdo = new PDO($dsn, $user, $password, $options);

    echo '¡CONEXION A LA BASE DE DATOS EXITOSA!!!<br>';

    //Insertar registros
    $stmt = $pdo->prepare("INSERT INTO users (nombre, email) VALUES (:nombre, :email)");
    $stmt->execute(['nombre' => 'usuario', 'email' => 'usuario@gmail.com']);
    
    echo 'Nuevo usuario agregado con ID: ' . $pdo->lastInsertId() . '<br>';

    // Recuperar registros
    $stmt = $pdo->query("SELECT * FROM users");

    while($row = $stmt->fetch())
    {
        echo "ID: " . $row['id'] . ", Nombre: " . $row['nombre'] . ", email: " . $row['email'] . '<br>'; 
    }


} catch (\PDOException $e){
    throw new \PDOException($e->getMessage(), (int)$e->getCode()); 
}



?>