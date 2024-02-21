<?php 
//importar la conexion
    require 'includes/config/database.php';
    $db = conectar_db();


//crear email y password
    $email = 'correo@correo.com';
    $password = '12345';
    $passwordHash = password_hash($password, PASSWORD_BCRYPT);


//query para crear usuario
    $query = "INSERT INTO usuarios(email, password) VALUES ('$email', '$passwordHash');";
    

//Agregarlo a la base de datos
    mysqli_query($db, $query);

?>