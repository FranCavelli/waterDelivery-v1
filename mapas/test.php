<?php

require('../php/conexion_be.php');

session_start();
if(!isset($_SESSION['nombreUsuario'])){
    echo '
        <script>
            alert("Porfavor inicia sesion");
        </script>
    ';
    header("location: ../index.php");
    session_destroy();
    die();
}
$idUser = $_SESSION['nombreUsuario'];

$rep = $_GET['rep'];
$lat = $_GET['latitud'];
$lng = $_GET['longitud'];

$query = "UPDATE usuarios SET lat=$lat WHERE nombreUsuario='$idUser'";
$result = mysqli_query($conexion, $query);
$query2 = "UPDATE usuarios SET lng=$lng WHERE nombreUsuario='$idUser'";
$result2 = mysqli_query($conexion, $query2);

header("location: ../reparto$rep.php");

?>