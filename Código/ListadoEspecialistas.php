<!DOCTYPE html>
<html lang="es">
    
    <head>
        
        <meta charset="utf-8">
        
        <title> Listado Especialista </title>    
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
         
        <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet"> 
        <link href="https://fonts.googleapis.com/css?family=Overpass&display=swap" rel="stylesheet">
        
        <!-- Link hacia el archivo de estilos css -->
        <link rel="stylesheet" href="css/estilo.css">
        <!-- Link hacia el archivo de estilos de bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <script src="script_listado.js"></script>
    </head>

  <body class="fondo"> <!-- Falta comprobar-->
<!--CONEXIÓN-->
<?php
    session_start();
    include("./GestionBD/conexion.php");
?>

<!--CABECERA-->
  <section class="photo" id="inicio">
        <div class="nav" id="sticker">
            <label for="toggle">&#9776</label>
            <input type="checkbox" id="toggle" />
            <div class="menu">
                <img src="IMG/logo.png" alt="" class="logo">
                <a href=""><i class="fa fa-home"> Inicio</i></a>
                <a href=""><i class="fa fa-info"> Como trabajar</i></a>
                <a href=""><i class="fa fa-briefcase"> Puesta en contacto</i></a>
                <a href=""><i class="fa fa-address-book"> Listado especialistas</i></a>
                <a href=""><i class="fa fa-calendar-o">Calendario</i></a>
            </div>
        </div>
        <div class="photo-text">
            <h4 data-ix="skype">Coaching sl</h4>
        </div>
        <div class="overlay"></div>
    </section>


<!-- Listado de especialistas -->

    <!-- Link hacia las librerias jsp de bootstrap -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<div class="titulos"> Listado de especialistas </div>
<div id="fondo_listado">
    <?php

      $sql="SELECT * FROM especialistas";  
      $result = mysqli_query($conn,$sql);
      
      if (mysqli_num_rows($result)>0){ //Si encuentra resultados
      while($row = mysqli_fetch_assoc($result)){
    ?>
    <div>
      <!-- <div class="card" style="width: 18rem; margin: 10px;">
        <img src="  <?php   /* echo $row['Foto']  */   ?>" class="card-img-top" alt="img3">
      -->

        <div class="card-body">
          <h5 class="card-title">Nombre: <?php echo $row['Nombre_Especialista']?> <?php echo $row['Apellido_Especialista']?></h5>
          <p class="card-text">Especialidades: <?php echo $row['Especialidad_Especialista']?></p> <!-- Como se hace-->
          <p class="card-text">Cuota: <?php echo $row['Cuota_Especialista']?><label name="Precio4"></label></p>
          <p class="card-text">Disponibilidad: <?php echo $row['Disponibilidad_Especialista']?></p> <!-- Como se hace-->
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">
              <input type="button" id="cantidad4" name="Añadir4" class="boton" value="Pedir Cita"> 
            <?php
              if ($_SESSION['usuario']== "Admin"){  //Debe ser NOMBRECLIENTE O QUE?
                //Si el usuario es Admin
            ?>
            <!--- enclaces para modificar o eliminar cada articulo --->
              <a href="ModificarEspecialista.php?id=<?php $row['ID_Especialista']?>"> Modificar </a> 
                <br>
              <a href="EliminarEspecialista.php?id=<?php $row['ID_Especialista']?>"> Eliminar </a>
                <br>
              <?php
                }
              ?>
            </li>
        </ul>
      </div>
  </div>




    <br>
  <?php   /*
   }
    if ($_SESSION['Usuario']== "Admin"){ //Si el usuario es Admin, permite añadir articulos
  ?>
  <br>
    <a href="AltaArticulo.php?"> Alta Artículo</a>  <!--- enlace de la derechca --->
  <?php  */ 
  
    }
  }


  ?>      
</div> <!--- cierra div contenedor2--->
          

<!-- PIE DE PAGINA -->
<footer>
Todos los derechos reservados | Coaching SL Copyright © 2024
</footer>


    </body>
</html>