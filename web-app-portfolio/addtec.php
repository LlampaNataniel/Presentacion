<?php
    require_once 'conexion.php';

    $nombreTecnologia = $_POST['tecnologia'];
    $tecnUPPER = strtoupper($nombreTecnologia);

    $sql_check = "SELECT nombreTecn FROM Tecnologias WHERE UPPER(nombreTecn) = ?";

// Prepara la sentencia de verificación
    $stmt_check = $conn->prepare($sql_check);
    $stmt_check->bind_param("s", $tecnUPPER);
    $stmt_check->execute();
    $stmt_check->store_result();

    if($stmt_check->num_rows > 0){
        echo("Error esa tecnologia ya esta en la base de datos");
    }

    else{
    $sql = "INSERT INTO Tecnologias(nombreTecn) VALUES (?)";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param("s", $nombreTecnologia);

    if($stmt->execute()){
        header("refresh:3;url=admin.php"); 
        echo "¡Tecnologia Agregada! Redirigiendo en 3 segundos...";
        exit;
    }
    else{
        echo("error");
    }
  }

?>