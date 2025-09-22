<?php
    require_once 'conexion.php';

    $nombreProyecto = $_POST['proyect'];
    $descripcionProyecto = $_POST['descripcion'];

    $proyUPPER = strtoupper($nombreProyecto);

    $sql_check = "SELECT nombreProy FROM Proyectos WHERE UPPER(nombreProy) = ?";

// Prepara la sentencia de verificación
    $stmt_check = $conn->prepare($sql_check);
    $stmt_check->bind_param("s", $proyUPPER);
    $stmt_check->execute();
    $stmt_check->store_result();

    if($stmt_check->num_rows > 0){
        echo("Error ese Proyecto ya esta en la base de datos");
    }

    else{
    $sql = "INSERT INTO Proyectos(nombreProy, descripcionProy) VALUES (?,?)";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param("ss", $nombreProyecto, $descripcionProyecto);

    if($stmt->execute()){
        echo ("Proyecto agregado");
    }
    else{
        echo("error");
    }

    //agregar en la tabla ProyxTecn las tecnologias

    $tecnologias = $_POST['tecnologias'];

    $arrayTecnologias = explode(',', $tecnologias);

    $arrayTecn =  array_map('trim', $arrayTecnologias);
    
    $id_nuevo_proyecto = $conn->insert_id;

    foreach ($arrayTecn as $tecnologia) {
    if (!empty($tecnologia)) {
        //buscar id tecnologia 
        $sqlT = "SELECT idTecn FROM tecnologias WHERE nombreTecn = ?";
        $stmtT = $conn->prepare($sqlT);
        $stmtT->bind_param("s", $tecnologia);
        $stmtT->execute();
        $resultT = $stmtT->get_result();

        if ($resultT->num_rows > 0) {
        $row = $resultT->fetch_assoc();
        $id_tecnologia = $row['idTecn'];


        $sql_insert_tec = "INSERT INTO proyectoxtecnologia (idProy, idTecn) VALUES (?, ?)";
        $stmt_tec = $conn->prepare($sql_insert_tec);
        $stmt_tec->bind_param("ii", $id_nuevo_proyecto, $id_tecnologia);
        $stmt_tec->execute();
        } else {
        echo "La tecnología " . $tecnologia_a_buscar . " no fue encontrada.";
        }

        
        }
    }
        header("refresh:3;url=admin.php"); 
        echo "¡Proyecto agregado! Redirigiendo en 3 segundos...";
        exit;
  }

?>
