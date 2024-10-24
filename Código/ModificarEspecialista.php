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

        <script src="script.js"></script>
    </head>

    <body class="fondo">


<!--CABECERA-->
<header id="header">
    <nav class="menu">
        <div class="logo">
            <img src="img/logo.png">
            <a href="#" class="btn-menu" id="btn-menu"><i class="icono fa fa-bars" aria-hidden="true"></i></a> 
        </div>
        <div id="enlaces" class="enlaces" >
            <a  href="Inicio.php"><i class="fa fa-home" aria-hidden="true"></i>Inicio</a>
            <a  href="ComoTrabajamos.php"><i class="fa fa-info" aria-hidden="true"></i> Como trabajamos</a>
            <a  href="Contacto.php"><i class="fa fa-briefcase" aria-hidden="true"></i>Puesta en contacto</a>
            <a  href="ListadoEspecialista.php"><i class="fa fa-envelope-o" aria-hidden="true"></i>Listado especialista</a>
            <a  href="Calendario.php"><i class="fa fa-envelope-o" aria-hidden="true"></i>Calendario</a>
        </div>
    </nav>
</header>





    <!-- Link hacia las librerias jsp de bootstrap -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

      <div class="titulo2"> Listado de especialistas </div>
      <div id="contenedor2">

<?php
	session_start();
  include ("./GestionBD/conexion.php");
  $sql="SELECT * FROM articulos";  
  $result = mysqli_query($conn,$sql);
  
  if (mysqli_num_rows($result)>0){ //Si encuentra resultados

  ?>
    <a href="AltaArticulo.php?"> Alta Artículo</a> <!--- enlace de la izquierda --->
    <br>
  <?php
    while($row = mysqli_fetch_assoc($result)){

	?>
           <div>
                <div class="card" style="width: 18rem; margin: 10px;">
                    <img src="<?php echo $row['Foto']?>" class="card-img-top" alt="img3">
                    <div class="card-body">
                      <h5 class="card-title">Nombre: <?php echo $row['Nombre']?></h5>
                      <p class="card-text">Descripcion: <?php echo $row['Descripcion']?></p>
                      <p class="card-text">Precio: <?php echo $row['Precio']?><label name="Precio4"></label></p>
                    </div>
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item">
                        <label for="cantidad4">Cantidad: </label>
                        <input  type="number" id="cantidad4" style="width: 80px;">
                        <input  type="button" id="cantidad4" name="Añadir4" class="boton" value="Añadir" onclick="ProdAdd('prod4','154')">
                      
                      <?php
                        if ($_SESSION['Usuario']== "Admin"){ //Si el usuario es Admin
                      ?>
                                <!--- enclaces para modificar o eliminar cada articulo --->
                          <a href="ModificarEspecialista.php?id=<?php $row['id_Articulo']?>"> Modificar </a> 
                          <br>
                          <a href="EliminarEspecialista.php?id=<?php $row['id_Articulo']?>"> Eliminar </a>
                          <br>
                      <?php
						            }
                      ?>
                      </li>
                    </ul>
                </div>
            </div>
            <br>
<?php
    }
      if ($_SESSION['Usuario']== "Admin"){ //Si el usuario es Admin, permite añadir articulos
      ?>
      <br>
      <a href="AltaArticulo.php?"> Alta Artículo</a>  <!--- enlace de la derechca --->
<?php
  }
}
?>      
      </div> <!--- cierra div contenedor2--->
          
        <span id="contenedor2">
            <h5><a href="login.php"> Inicio </a></h5>
        </span>  
        

<!-- PIE DE PAGINA -->
<footer>
Todos los derechos reservados | Coaching SL Copyright © 2024
</footer>


    </body>
</html>
