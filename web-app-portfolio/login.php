<?php
// Usamos $_POST para obtener los datos
require_once 'conexion.php';

if (isset($_POST['username']) && isset($_POST['password'])) {
$usuario = $_POST['username'];
$password = $_POST['password'];
}


$sql = "SElECT idUser, userName, password FROM usuario";
$result = $conn->query($sql);
if($result->num_rows > 0){
    $row = $result->fetch_assoc();
    if( $row['userName']== $usuario && $row['password']== $password){
        echo("contraseña correcta");
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        header("Location: admin.php");
        exit;
    }
    else{
        echo("Contraseña o Usuario incorrecto");
        header("refresh:3;url=index.php"); 
        echo "Redirigiendo en 3 segundos...";
    }
} 


?>