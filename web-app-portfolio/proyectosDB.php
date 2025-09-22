<?php
    require_once 'conexion.php';

    $sql = "SELECT idProyecto, nombreProy, descripcionProy FROM Proyectos";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        


    while($row = $result->fetch_assoc()) {

        //buscamos las tecnologias que usa ese proyecto
        $sql_Proy = "SELECT idTecn From proyectoxtecnologia WHERE idProy = ?";

        $stmt_check = $conn->prepare($sql_Proy);
        $stmt_check->bind_param("i", $row['idProyecto']);
        $stmt_check->execute();
        $stmt_check->store_result();
        $stmt_check->bind_result($idTecnologia);


        echo "<div  class='proyectsItems'>";
        echo "<h2>". htmlspecialchars($row['nombreProy']) . "</h2>";
        echo "<p>". htmlspecialchars($row['descripcionProy']). "</p>";
        echo "<ul class='tecnologias-list'>";
        while ($stmt_check->fetch()){

            $sql_tecn = "SELECT nombreTecn From tecnologias WHERE idTecn = ?";

            $stmt_tecn = $conn->prepare($sql_tecn);
            $stmt_tecn->bind_param("i", $idTecnologia);
            $stmt_tecn->execute();
            $stmt_tecn->store_result();

            $stmt_tecn->bind_result($nombreTecn);

            if ($stmt_tecn->fetch()) {
                // Ahora sí podemos imprimir el nombre de la tecnología
            echo "<li>" . htmlspecialchars($nombreTecn) . "</li>";
            }

        }
        echo "</ul>";
        echo "</div>";
    }
    } else {
        echo "<p>No hay Proyectos para mostrar.</p>";
    }



?>