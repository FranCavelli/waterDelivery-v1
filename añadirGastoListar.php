<?php
use LDAP\Result;

    require('php/conexion_be.php');

    $query = "SELECT * FROM gastos";
    $result = mysqli_query($conexion, $query);
    if(!$result){
        die('Query fail');
    }
    $json = array();
    while($row = mysqli_fetch_array($result)){
        $json[] = array(
            'id' => $row['id'],
            'nombre' => $row['nombre'],
            'costo' => $row['costo'],
            'fecha' => $row['fecha']
        );
    }
    $jsonString = json_encode($json);
    echo $jsonString;
?>