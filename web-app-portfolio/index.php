<?php
  require_once 'conexion.php';
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="stylesPresentacion.css">
    <title>Presentacion</title>
</head>
<hedaer class="header">
  <nav>
    <a class="group-link" href="#aboutme">Sobre mi</a>
    <a class="group-link" href="#tecnologias">Tecnologias</a>
    <a class="group-link" href="#proyects">Proyectos</a>
    <a class="group-link" href="#contact">Contacto</a>
  </nav>

</hedaer>

<body>
<h1>Llampa Nataniel Alexis</h1>
<figure class="imgPres">
 <img src="eunbiaaa.jfif" alt="Photo" width="25%">
 <figcaption>Estudiante universitario</figcaption>
</figure>
<h1>Programador web</h1>
<br/>
<div id="aboutme">
    <h2 class="title-sub">Sobre mi</h2>
    <p class="presentacion">Soy estudiante de la Licenciatura en Análisis de Sistemas y de la Tecnicatura Universitaria en</p>
    <p class="presentacion">Programación. Me especializo en el desarrollo Backend, con experiencia en tecnologías como Java y</p>
    <p class="presentacion">Python, utilizando frameworks como Spring.</p>
    <p class="presentacion">Tengo sólidos conocimientos en bases de datos relacionales y no relacionales, incluyendo MySQL, MariaDB</p>
    <p class="presentacion">y MongoDB. Además, poseo nociones de desarrollo Frontend, lo que me permite trabajar de forma integral</p>
    <p class="presentacion">en proyectos full stack.</p>
    <p class="presentacion">Me considero una persona proactiva, con capacidad de aprendizaje continuo y orientado a la resolución de problemas.</p>
</div><br/>

<div id="proyects">
    <h2 class="title-sub">Proyectos</h2>
      <div class="rowItems">
        
        <?php
          require_once 'proyectosDB.php';

        ?>

      </div>

  </div><br/>

<div id="tecnologias">
    <h2 class="title-sub">Tecnologias</h2>
      <div class="rowItems">
          <?php
            require_once 'tecnologiasBD.php';
          ?>
      </div>
  </div><br/>

 
  
 <div id="contact">
    <h2 class="title-sub">Contacto</h2>
    <p>Linkedin</p>
    <p>Correo : nataalex45@gmail.com</p>
  </div> 


  <div id="acceso" >
    <h2 class="title-sub">Acceso Administrador</h2>
<button id="open-login-btn">Acceso</button>
</div>
<div id="modal-container" class="modal-hidden">
    <div class="modal-backdrop"></div>
    
    <div class="modal-content">
        <span class="close-btn">&times;</span>
        <form action="login.php" method="POST">
            <h2>Acceso de Administrador</h2>
            <label for="username">Usuario:</label>
            <input type="text" id="username" name="username">
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password">
            <button type="submit">Entrar</button>
        </form>
    </div>
</div>

<script src="filejs.js"></script>
</body>

<footer>
    <div>Todos los derechos Reservados</div>
</footer>

</html>