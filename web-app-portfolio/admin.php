<html>
<title>Administrador</title>
<link rel="stylesheet" href="admincss.css">
<body>

    <div>
    <?php
        session_start();
        if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
        header("refresh:3;url=index.php"); 
        echo "¡Debes Iniciar sesion! Redirigiendo en 3 segundos...";     
        exit;
}


        require_once 'proyectosList.php';
    ?>

    </div>



    <div id="tecnologias">
        <h1>Agregar Tecnologia</h1>
        <form action="addtec.php" method="POST">
            <label>Nombre Tecnologia</label>
            <input type="text" name="tecnologia">
            <button type="submit">Agregar</button>
        </form>
    </div>


    <div id="proy">
        <h1>Agregar Proyecto</h1>
        <form action="addProy.php" method="POST">


            <label>Nombre Proyecto</label>
            <input type="text" name="proyect"><br/>

            <label>Descripcion</label>
            <textarea name="descripcion" rows="8" required></textarea>
            <br/>
            <label for="tecnologias">Tecnologías (separadas por comas):</label>
            <input type="text" id="tecnologias" name="tecnologias" required>


            <button type="submit">Agregar Proyecto</button>
        </form>
    </div>

    <div>
        <a href="logout.php">
            <button>Cerrar Sesion</button>
        </a>
    </div>
</body>

</html>
