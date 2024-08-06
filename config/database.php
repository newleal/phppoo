<?php

require_once __DIR__ . '/config.php';

$dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;

$options = [

    PDO::ATTR_ERRMODE               =>   PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE    =>   PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES      =>   false
];

try{
    $pdo = new PDO($dsn, DB_USER, DB_PASS, $options);

    echo '¡CONEXION A LA BASE DE DATOS EXITOSA!!!<br>';

    //Insertar registros
    // $stmt = $pdo->prepare("INSERT INTO users (nombre, email) VALUES (:nombre, :email)");
    // $stmt->execute(['nombre' => 'usuario', 'email' => 'usuario@gmail.com']);
    
    // echo 'Nuevo usuario agregado con ID: ' . $pdo->lastInsertId() . '<br>';

    // // Recuperar registros
    // $stmt = $pdo->query("SELECT * FROM users");

    // while($row = $stmt->fetch())
    // {
    //     echo "ID: " . $row['id'] . ", Nombre: " . $row['nombre'] . ", email: " . $row['email'] . '<br>'; 
    // }


} catch (\PDOException $e){
    throw new \PDOException($e->getMessage(), (int)$e->getCode()); 
}



?>