<?php
    require_once 'conexion.php';

    $sql = "SELECT idProyecto, nombreProy FROM Proyectos";
    $result = $conn->query($sql);

    if($result->num_rows >0){
            echo "<div id='proyectosList'>";
            echo "<h1> Eliminar Proyectos </h1>";
        while($row = $result->fetch_assoc()){

          

            echo "<form action='eliminar_proyecto.php' method='POST'>";
            
            echo "<label>" .$row['nombreProy']. "</label>";
            echo "<input type='hidden' name='id_proyecto' value='" . htmlspecialchars($row['idProyecto']) . "'>";
            echo "<button type='submit' class='delete-btn'>Eliminar</button>";
            echo "</form>";

           

        }
             echo "</div>";

    }


?>