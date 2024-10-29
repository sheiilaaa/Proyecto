<?php
include("Conexion.php");

$sql = "CREATE DATABASE Tienda";
if (mysqli_query($conn,$sql)) {
    echo " La base de datos Tienda se ha creado correctamente ";
}    else{
    echo "No ha sido posible crear la base de datos, error: " . mysqli_error($conn);
} 
mysqli_close($conn);

?>