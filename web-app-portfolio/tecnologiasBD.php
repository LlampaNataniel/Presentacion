<?php
    require_once 'conexion.php';

    $sql = "SELECT nombreTecn FROM Tecnologias";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<p>" . htmlspecialchars($row['nombreTecn']) . "</p>";
        }
    } else {
        echo "<p>No hay tecnologias para mostrar.</p>";
    }



?>