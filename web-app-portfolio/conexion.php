<?php
    $conn = mysqli_connect("localhost","root", "", "Presentacion");

    if(!$conn){
        die("Conexion fallida : ". mysqli_connect_error());
    }   
    
?>