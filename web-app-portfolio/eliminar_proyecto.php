<?php
    require_once 'conexion.php';
    $idProy = $_POST['id_proyecto'];

    $sql = "DELETE FROM proyectos WHERE idProyecto=?";

     $stmt_check = $conn->prepare($sql);
     $stmt_check->bind_param("i", $idProy);
     if($stmt_check->execute()){
        header("refresh:3;url=admin.php"); 
        echo "¡Proyecto eliminado! Redirigiendo en 3 segundos...";
        exit;
        }
     else{
        echo "Error al intentar eliminar el proyecto";
     }
     
    $stmt_check->close();

    $conn->close();
?>