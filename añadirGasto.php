<?php
use LDAP\Result;

    require('php/conexion_be.php');
    
    if(isset($_POST['nombre'])){
        $id=$_POST['id'];
        $nombre = $_POST['nombre'];
        $costo = $_POST['costo'];

        $query = "INSERT into gastos (nombre, costo) VALUES ('$nombre', '$costo')";
        $result = mysqli_query($conexion, $query);

        if(!$result){
            die('Query Fail');
        }
        echo 'Gasto añadido correctamente';
    }

?>